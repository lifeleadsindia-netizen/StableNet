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

<!-- CUSTOM-SWITCHER JS -->
<link rel="modulepreload" href="{{ asset('user_assets/custom-switcher-383b6a5b.js') }}" />
<script type="module" src="{{ asset('user_assets/custom-switcher-383b6a5b.js') }}"></script>




<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
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
            $('#profile_button').show();
        } else {
            $('#activation').modal('hide');
            $('#profile_button').hide();
        }

        var status = $('#ustatus').val();
        if (status == 'Temp') {
            $('#activation').modal('show');
            $('#profile_button').show();
        } else {
            $('#activation').modal('hide');
            $('#profile_button').hide();
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

</body>


</html>
