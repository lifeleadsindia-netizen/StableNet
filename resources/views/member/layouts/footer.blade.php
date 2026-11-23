<!-- FOOTER -->

<footer class="footer mt-auto py-3 bg-white text-center">
    <div class="container">
        <span class="text-muted"> Copyright © All Rights Reserved by {{ config('detailsApp.name') }} {{ date('Y') }}
            <span id="year"></span> <a href="javascript:void(0);" class="text-dark fw-semibold"></a>.
            Designed with <span class="bi bi-heart-fill text-danger"></span><a href="https://spruko.com/" target="_blank">
                {{-- <span class="fw-semibold text-primary text-decoration-underline">Stable Coin</span>
            </a> All
            rights
            reserved
        </span> --}}
    </div>
</footer>
<!-- END FOOTER -->

</div>
<!-- END PAGE-->

<!-- SCRIPTS -->

<!-- SCROLL-TO-TOP -->
<div class="scrollToTop">
    <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
</div>
<div id="responsive-overlay"></div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" ></script>

<!-- POPPER JS -->
<script src="{{ asset('user_assets/libs/%40popperjs/core/umd/popper.min.js') }}"></script>

<!-- BOOTSTRAP JS -->
<script src="{{ asset('user_assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- NODE WAVES JS -->
<script src="{{ asset('user_assets/libs/node-waves/waves.min.js') }}"></script>

<!-- SIMPLEBAR JS -->
<script src="{{ asset('user_assets/libs/simplebar/simplebar.min.js') }}"></script>
<link rel="modulepreload" href="{{ asset('user_assets/simplebar-635bad04.js') }}" />
<script type="module" src="{{ asset('user_assets/simplebar-635bad04.js') }}"></script>

<!-- COLOR PICKER JS -->
<script src="{{ asset('user_assets/libs/%40simonwep/pickr/pickr.es5.min.js') }}"></script>

<!-- JSVECTOR MAPS JS -->
<script src="{{ asset('user_assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
<script src="{{ asset('user_assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

<!-- APEX CHARTS JS -->
<script src="{{ asset('user_assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- CHARTJS CHART JS -->
<script src="{{ asset('user_assets/libs/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('a_assets/js/chats.js') }}"></script>

<!-- CRM-Dashboard -->
<link rel="modulepreload" href="{{ asset('user_assets/crm-dashboard-5975eef2.js') }}" />
<script type="module" src="{{ asset('user_assets/crm-dashboard-5975eef2.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
<script src="{{ asset('user_assets/block.js') }}"></script>

<!-- STICKY JS -->
<script src="{{ asset('user_assets/sticky.js') }}"></script>

<!-- APP JS -->
<link rel="modulepreload" href="{{ asset('user_assets/app-3cade095.js') }}" />
<script type="module" src="{{ asset('user_assets/app-3cade095.js') }}"></script>

<!-- DataTables Scripts -->
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>



<script src="{{ asset('user_assets/datatables.js') }}"></script>
<script src="{{ asset('user_assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
<!-- MAIN JS -->
<script src="{{ asset('user_assets/main.js') }}"></script>

<!-- END SCRIPTS -->

<script>
    $(document).ready(function() {

        //package selection code
        $('#amount').on('input', function() {
            var amount = $(this).val();
            var package = $("#package").val();
            $("#amountMsg").html('');
            if (package == '') {
                alert('Please select package first');
            }
            if (amount.length > 0) {
                if (package == 'Silver') {
                    total_amount = parseInt(amount) + 10;
                    if (amount < 100 || amount > 500) {
                        $("#amountMsg").html(
                            '<span class="text-danger">*** Amount must be greater than $100 and less than $500</span>'
                        );
                        $("#total").html('');
                    } else {
                        $("#total").html(
                            '<span style="color: #eb9e09">*** You need to have ' + total_amount +
                            ' in wallet Balance</span>'
                        );
                    }
                } else if (package == 'Gold') {
                    total_amount = parseInt(amount) + 20;
                    if (amount < 501 || amount > 1000) {
                        $("#amountMsg").html(
                            '<span class="text-danger">*** Amount must be greater than $501 and less than $1000</span>'
                        );
                        $("#total").html('');
                    } else {
                        $("#total").html(
                            '<span style="color: #eb9e09">*** You need to have ' + total_amount +
                            ' in wallet Balance</span>'
                        );
                    }
                } else if (package == 'Diamond') {
                    total_amount = parseInt(amount) + 50;
                    if (amount < 1001 || amount > 2000) {
                        $("#amountMsg").html(
                            '<span class="text-danger">*** Amount must be greater than $1001 and less than $2000</span>'
                        );
                        $("#total").html('');
                    } else {
                        $("#total").html(
                            '<span style="color: #eb9e09">*** You need to have ' + total_amount +
                            ' in wallet Balance</span>'
                        );
                    }
                } else if (package == 'Crown') {
                    total_amount = parseInt(amount) + 100;
                    if (amount < 2001) {
                        $("#amountMsg").html(
                            '<span class="text-danger">*** Amount must be greater than $2001</span>'
                        );
                        $("#total").html('');
                    } else {
                        $("#total").html(
                            '<span style="color: #eb9e09">*** You need to have ' + total_amount +
                            ' in wallet Balance</span>'
                        );
                    }
                } else {
                    $("#amountMsg").html('');
                    $("#total").html('');
                }
            } else {
                $("#amountMsg").html('');
                $("#total").html('');
            }
        });

        var status = $('#status').val();
        if (status == 'Temp') {
            $('#activation').modal('show');
        } else {
            $('#activation').modal('hide');
        }

        var ustatus = $('#ustatus').val();
        if (ustatus == 'Temp') {
            $('#activation').modal('show');
        } else {
            $('#activation').modal('hide');
        }

        $('#profile_button').on('click', function() {
            $(this).html('Processing .......')
        });

        $('#act_btn').on('click', function() {
            $(this).html('Processing .......')
        });

        $('#type').on('change', function() {
            var wallet = parseFloat($('#wallet').val()) || 0;
            $('#wallet_text').html('Income Wallet');
            $('#wallet_amount').html('$ ' + wallet.toFixed(2));
        });

        // // activation button
        // $('.activate_deposit').on('click', function() {
        //     $(this).html('Processing <img src="{{ asset('uploads/images/march-balls.gif') }}">')
        // })

        // // upgrade button
        // $('.upgradeBtn').on('click', function() {
        //     $(this).html('Processing <img src="{{ asset('uploads/images/march-balls.gif') }}">')
        // })

        // // withdrawal button
        // $('.withdraw_btn').on('click', function() {
        //     $(this).html('Processing <img src="{{ asset('uploads/images/march-balls.gif') }}">')
        // })



        //referal link
        $('#copyButtonId').on('click', function() {
            var text = $('#code').text()
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(text).select();
            document.execCommand("copy");
            $temp.remove();
            $('#msgText').html('Text Copied')
        });

        $('#copyButtonIdRight').on('click', function() {
            var text = $('#codeRight').text()
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(text).select();
            document.execCommand("copy");
            $temp.remove();
            $('#msgTextRight').html('Text Copied');
            $('#rcode').show().delay(3000).fadeOut();
        });

        //referal link
        $('#copyButtonIdLeft').on('click', function() {
            var text = $('#codeLeft').text()
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(text).select();
            document.execCommand("copy");
            $temp.remove();
            $('#msgTextLeft').html('Text Copied');
            $('#rcode').show().delay(3000).fadeOut();
        });
    });
</script>
<script>
    $(document).ready(function() {
        //user id setting
        $('#userid').on('input', function() {
            var userid = $(this).val();
            if (userid.length == 0) {
                $('#messageU').html('');
            }
            $.ajax({
                url: '/getUserid',
                type: 'POST',
                data: {
                    'userid': userid,
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {

                    $('#messageU').html(response['data']);
                    $('#packAmount').val(response['package']);
                    $('#package').val(response['plan']);

                    if (response['code'] == 0) {
                        $('#actBtn').attr("disabled", true);
                    } else {
                        $('#actBtn').attr('disabled', false);
                    }
                }
            })
        });

        $('#myForm').on('submit', function() {
            $('#subBtn').html('Processing....');
            $('#subBtn').prop('disabled', true);
        });

        $('#stakingForm').on('submit', function() {
            if (!$('#subsBtn').find('.spinner-border').length) {
                $('#subsBtn').html('<span class="spinner-border spinner-border-sm me-2" role="status"></span> Processing...');
            }
            $('#subsBtn').prop('disabled', true);
        });

    });
</script>

<!-- STABLENET MEMBER SIDEBAR CONTROLLER -->
<script>
(function() {
    'use strict';

    function initMemberSidebar() {
        const html = document.documentElement;
        const sidebar = document.getElementById("sidebar");
        const overlay = document.getElementById("responsive-overlay");
        const toggleButtons = document.querySelectorAll(".sidemenu-toggle, [data-bs-toggle='sidebar']");
        const closeButtons = document.querySelectorAll(".sidebar-close-btn");

        const isDesktop = function() {
            return window.innerWidth >= 992;
        };

        // Reset any conflicting template localStorage state
        try {
            localStorage.removeItem("ynexverticalstyles");
            localStorage.removeItem("ynexlayout");
            localStorage.removeItem("ynexnavstyles");
        } catch(e) {}

        html.setAttribute("data-nav-layout", "vertical");
        html.setAttribute("data-vertical-style", "default");
        if (isDesktop()) {
            html.removeAttribute("data-toggled");
            html.classList.remove("sidebar-collapsed");
        } else {
            html.setAttribute("data-toggled", "close");
            html.classList.remove("sidebar-open");
        }

        function openSidebar() {
            if (isDesktop()) {
                html.removeAttribute("data-toggled");
                html.classList.remove("sidebar-collapsed");
            } else {
                html.setAttribute("data-toggled", "open");
                html.classList.add("sidebar-open");
                if (overlay) {
                    overlay.classList.add("active");
                    overlay.style.display = "block";
                }
            }
        }

        function closeSidebar() {
            if (isDesktop()) {
                html.setAttribute("data-toggled", "close-menu-close");
                html.classList.add("sidebar-collapsed");
            } else {
                html.setAttribute("data-toggled", "close");
                html.classList.remove("sidebar-open");
                if (overlay) {
                    overlay.classList.remove("active");
                    overlay.style.display = "none";
                }
            }
        }

        function toggleSidebar(e) {
            if (e) e.preventDefault();
            if (isDesktop()) {
                if (html.getAttribute("data-toggled") === "close-menu-close" || html.classList.contains("sidebar-collapsed")) {
                    openSidebar();
                } else {
                    closeSidebar();
                }
            } else {
                if (html.getAttribute("data-toggled") === "open" || html.classList.contains("sidebar-open")) {
                    closeSidebar();
                } else {
                    openSidebar();
                }
            }
        }

        // Attach hamburger toggle handlers
        toggleButtons.forEach(function(btn) {
            btn.removeEventListener("click", toggleSidebar);
            btn.addEventListener("click", toggleSidebar);
        });

        // Attach mobile close button handlers
        closeButtons.forEach(function(btn) {
            btn.addEventListener("click", function(e) {
                e.preventDefault();
                closeSidebar();
            });
        });

        // Overlay backdrop click closes mobile drawer
        if (overlay) {
            overlay.addEventListener("click", function() {
                closeSidebar();
            });
        }

        // Handle window resize cleanly
        window.addEventListener("resize", function() {
            if (isDesktop()) {
                html.classList.remove("sidebar-open");
                if (html.getAttribute("data-toggled") === "open") {
                    html.removeAttribute("data-toggled");
                }
                if (overlay) {
                    overlay.classList.remove("active");
                    overlay.style.display = "none";
                }
            } else {
                html.classList.remove("sidebar-collapsed");
            }
        });

        // Submenu accordion dropdown handlers
        const subMenuItems = document.querySelectorAll(".app-sidebar .slide.has-sub > .side-menu__item");
        subMenuItems.forEach(function(item) {
            item.addEventListener("click", function(e) {
                e.preventDefault();
                const parentSlide = this.closest(".slide.has-sub");
                if (!parentSlide) return;

                const isOpen = parentSlide.classList.contains("open");

                // Close other open sibling submenus for accordion layout
                const siblings = parentSlide.parentElement.querySelectorAll(":scope > .slide.has-sub.open");
                siblings.forEach(function(sib) {
                    if (sib !== parentSlide) {
                        sib.classList.remove("open");
                        const sibMenu = sib.querySelector(":scope > .slide-menu.child1");
                        if (sibMenu) sibMenu.style.display = "none";
                    }
                });

                // Toggle selected submenu
                if (isOpen) {
                    parentSlide.classList.remove("open");
                    const childMenu = parentSlide.querySelector(":scope > .slide-menu.child1");
                    if (childMenu) childMenu.style.display = "none";
                } else {
                    parentSlide.classList.add("open");
                    const childMenu = parentSlide.querySelector(":scope > .slide-menu.child1");
                    if (childMenu) childMenu.style.display = "block";
                }
            });
        });

        // Client-side active URL matcher & auto-drawer-close on mobile navigation
        const currentPath = window.location.pathname.replace(/\/+$/, "");
        const allLinks = document.querySelectorAll(".app-sidebar .side-menu__item[href]");
        allLinks.forEach(function(link) {
            const href = link.getAttribute("href");
            if (!href || href === "javascript:void(0);") return;

            let linkPath = "";
            try {
                linkPath = new URL(href, window.location.origin).pathname.replace(/\/+$/, "");
            } catch (err) {
                linkPath = href;
            }

            if (linkPath === currentPath || (linkPath !== "" && linkPath !== "/member" && linkPath !== "/member/dashboard" && currentPath.startsWith(linkPath))) {
                link.classList.add("active");
                const parentLi = link.closest("li.slide");
                if (parentLi) parentLi.classList.add("active");

                const parentMenu = link.closest(".slide-menu.child1");
                if (parentMenu) {
                    parentMenu.style.display = "block";
                    const parentSub = parentMenu.closest(".slide.has-sub");
                    if (parentSub) {
                        parentSub.classList.add("open", "active");
                    }
                }
            }

            // On mobile, clicking a navigation link closes the drawer
            link.addEventListener("click", function() {
                if (!isDesktop() && href !== "javascript:void(0);") {
                    closeSidebar();
                }
            });
        });

        // Smoothly scroll active item into view inside sidebar if needed
        setTimeout(function() {
            const activeItem = document.querySelector(".app-sidebar .side-menu__item.active");
            const scrollContainer = document.getElementById("sidebar-scroll");
            if (activeItem && scrollContainer) {
                const rect = activeItem.getBoundingClientRect();
                const containerRect = scrollContainer.getBoundingClientRect();
                if (rect.top < containerRect.top || rect.bottom > containerRect.bottom) {
                    activeItem.scrollIntoView({ behavior: "smooth", block: "nearest" });
                }
            }
        }, 150);
    }

    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", initMemberSidebar);
    } else {
        initMemberSidebar();
    }
})();
</script>

</body>


</html>
