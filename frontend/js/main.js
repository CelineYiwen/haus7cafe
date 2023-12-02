
// This self-invoking function ensures that the code inside operates in a private scope,
// preventing potential variable conflicts in the global scope.
(function ($) {
    "use strict";

    // Spinner function to hide the loading spinner after a short delay.
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Initiate the WOW.js library for adding animations to elements on scroll.
    new WOW().init();


    // Sticky Navbar functionality - adds a sticky class to the navbar when scrolling down.
    $(window).scroll(function () {
        if ($(this).scrollTop() > 0) {
            $('.navbar').addClass('sticky-top shadow-sm');
        } else {
            $('.navbar').removeClass('sticky-top shadow-sm');
        }
    }); 
    
    
    // Dropdown on mouse hover behavior for larger screens (min-width: 992px).
    const $dropdown = $(".dropdown");
    const $dropdownToggle = $(".dropdown-toggle");
    const $dropdownMenu = $(".dropdown-menu");
    const showClass = "show";
    
    $(window).on("load resize", function() {
        if (this.matchMedia("(min-width: 992px)").matches) {
            $dropdown.hover(
            function() {
                const $this = $(this);
                $this.addClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "true");
                $this.find($dropdownMenu).addClass(showClass);
            },
            function() {
                const $this = $(this);
                $this.removeClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "false");
                $this.find($dropdownMenu).removeClass(showClass);
            }
            );
        } else {
            // Remove hover behavior for smaller screens.
            $dropdown.off("mouseenter mouseleave");
        }
    });
    
    
    // Back to top button - shows or hides based on the scroll position.
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });

    // Scroll to top animation when the back-to-top button is clicked.
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });

    // Facts counter - uses the CounterUp plugin to animate numeric counters.
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Modal Video functionality - handles playing and pausing videos in a modal.
    $(document).ready(function () {
        var $videoSrc;

        // Set the video source when the play button is clicked.
        $('.btn-play').click(function () {
            $videoSrc = $(this).data("src");
        });
        console.log($videoSrc);

        // Update the video source and autoplay when the modal is shown.
        $('#videoModal').on('shown.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        })


        // Reset the video source when the modal is hidden.
        $('#videoModal').on('hide.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc);
        })
    });


})(jQuery);



