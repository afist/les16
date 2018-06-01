$(function(){ 

    M1.init();
/*    $(window).resize(function() {
        M1.modalRefresh();
    });
    M1.modalRefresh();*/
    $(document).on("click", ".m1modal", function(event) {
        if (event.target != this) {
            return false;
        } else {
            M1.modalHide($(this).closest(".m1modal"));
        }
    }).on("click", ".close-m1", function(event) {
        if (event.target != this) {
            return false;
        } else {
            M1.modalHide($(this).closest(".m1modal"));
            $("#overlay-popup-m1").hide();
            // $("#overlay-popup-m2").hide();
            M1.panelQuicklyOrderShow();
        }
    }).on("keydown", function(key) {
        if (key.keyCode == 27) {
            M1.modalHide($(".m1modal:visible:last"));
        }
    }).on("click", ".m1modal > *", function(event) {
        event.stopPropagation();
        return true;
    });
});
var M1 = (function($, $n) {
    return $.extend($n, {
        init: function() {
            var current = this;
        },
        modalHide: function($modal) {
            $modal.fadeOut("fast", function() {
                if (!$(".m1modal:visible").length) {
                    $("body").removeClass("m1modal-show");
                }
                $("#overlay-popup-m1").hide();
            });
        },
        modalRefresh: function() {
            if ($(".m1modal:visible:last").length) {
                var modalBlock = $(".m1modal:visible:last .m1modal-block"),
                    width = parseInt(modalBlock.width()),
                    height = parseInt(modalBlock.height());
                if ($(window).height() > height + 20) {
                    modalBlock.addClass("m1modal-top").removeClass("margin-t-b").css("margin-top", -1 * (height / 2));
                } else {
                    modalBlock.addClass("margin-t-b").removeClass("m1modal-top");
                }
                if ($(window).width() > width) {
                    modalBlock.addClass("m1modal-left").removeClass("margin-l").css("margin-left", -1 * (width / 2));
                } else {
                    modalBlock.addClass("margin-l").removeClass("m1modal-left");
                }
            }
        },
        panelQuicklyOrderHide: function() {
            var selector = $('#mobile_div');
            if (selector.length > 0) {
                selector.hide();
            }
        },

        panelQuicklyOrderShow: function() {
            var selector = $('#mobile_div');
            if (selector.length > 0) {
                selector.show();
            }
        },

        modalShow: function($modal) {
            $modal.fadeIn("fast");
            $("body").addClass("m1modal-show");
            this.modalRefresh();
            this.panelQuicklyOrderHide();
        },
        initComebacker: function(timeout) {
            try {
                setTimeout(function start_M1comebacker() {
                    var comebacker = true;
                    $(window).on("mouseout", function(event) {
                        if (event.pageY - $(window).scrollTop() < 1 && comebacker) {
                            comebacker = false;
                            var modalWindow = $("#m1-form");
                            M1.modalShow(modalWindow);
                            $("#overlay-popup-m1").show();
                            return false;
                        }
                    });
                }, timeout);
            } catch (e) {}
        }
    });
})(jQuery, M1 || {});