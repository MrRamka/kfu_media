<?php


namespace App\ProviderService;


use App\App;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;

/**
 * Provides methods to load pages via http
 * @package App\ProviderService
 */
class ProviderService
{
    private function request(string $link, string $method, array $data = []): string
    {
        if (!empty($data))
            $promise = App::$app->guzzle()->requestAsync($method, $link, ['multipart' => $data]);
        else
            $promise = App::$app->guzzle()->requestAsync($method, $link);
        $text = $promise->then(
            function (ResponseInterface $res) {
                return (string)$res->getBody();
            },
            function (RequestException $e) {
                App::$app->logger()->error($e->getMessage());
                throw new \Exception($e->getMessage());
            }
        )->wait();
        return $text;
    }

    public function get(string $link): string
    {
        return $this->request($link, 'GET');
    }

    public function post(string $link, array $data = []): string
    {
        $body = [];
        if (!empty($data)) {
            foreach ($data as $k => $v) {
                $body[] = [
                    'name' => $k,
                    'contents' => $v
                ];
            }
        }
        return $this->request($link, 'POST', $body);
    }

    public function buildUrl(array $parsed_url):string
    {
        $scheme = isset($parsed_url['scheme']) ? $parsed_url['scheme'] . '://' : '';
        $host = isset($parsed_url['host']) ? $parsed_url['host'] : '';
        $port = isset($parsed_url['port']) ? ':' . $parsed_url['port'] : '';
        $user = isset($parsed_url['user']) ? $parsed_url['user'] : '';
        $pass = isset($parsed_url['pass']) ? ':' . $parsed_url['pass'] : '';
        $pass = ($user || $pass) ? "$pass@" : '';
        $path = isset($parsed_url['path']) ? $parsed_url['path'] : '';
        $query = isset($parsed_url['query']) ? '?' . $parsed_url['query'] : '';
        $fragment = isset($parsed_url['fragment']) ? '#' . $parsed_url['fragment'] : '';
        return "$scheme$user$pass$host$port$path$query$fragment";
    }
}