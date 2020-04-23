(function ($) {

    "use strict";

    $(document).on('click', '.loginPopup-trigger', function (event) {
      event.preventDefault();
      $.fancybox.open({
        'src': '#login'
      });
    });

  })(jQuery);