</div>
<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#addPaymentTypeForm').submit(function(event) {
            event.preventDefault();

            $('#nameError').html('');
            $('#message').html('');

            $.ajax({
                url: '<?php echo site_url("payments/add_payment_type"); ?>',
                type: 'post',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $('#message').html('<div class="alert alert-success">' + response.message + '</div>');
                        $('#addPaymentTypeForm')[0].reset();
                    } else {
                        $('#nameError').html(response.errors.name);
                    }
                }
            });
        });
    });

    $('#addCurrencyForm').submit(function(event) {
        event.preventDefault();

        $('#nameError').html('');
        $('#message').html('');

        $.ajax({
            url: '<?php echo site_url("payments/add_currency"); ?>',
            type: 'post',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#message').html('<div class="alert alert-success">' + response.message + '</div>');
                    $('#addPaymentForm')[0].reset();
                } else {
                    $('#nameError').html(response.errors.name);
                }
            }
        });
    });

    $(document).ready(function() {
        $('#addPaymentForm').submit(function(event) {
            event.preventDefault();

            $('#message').html('');

            $('#amount').removeClass('is-invalid');
            $('#category').removeClass('is-invalid');
            $('#currency').removeClass('is-invalid');
            $('#type').removeClass('is-invalid');
            $('#comment').removeClass('is-invalid');

            $('#amount').siblings('.invalid-feedback').text('');
            $('#category').siblings('.invalid-feedback').text('');
            $('#сurrency').siblings('.invalid-feedback').text('');
            $('#type').siblings('.invalid-feedback').text('');
            $('#comment').siblings('.invalid-feedback').text('');

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("payments/add_payment"); ?>',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $('#message').html('<div class="alert alert-success">' + response.message + '</div>');
                        $('#addPaymentForm')[0].reset();
                    } else {
                        $.each(response.errors, function(key, value) {
                            //testing
                            console.log(key + " - " + value);
                            $('#' + key).addClass('is-invalid');
                            $('#' + key).siblings('.invalid-feedback').text(value);
                        });
                    }
                }
            });
        });
    });

    $('#paymentTableFilter').submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("payments/payment_table"); ?>',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                var tableBody = $("#paymentTableBody");
                tableBody.empty();


                $.each(response.payments, function(index, payment) {
                    var newRow = '<tr>' +
                        '<td>' + (payment.type === 'mədaxil' ? payment.amount : '') + '</td>' +
                        '<td>' + (payment.type === 'məxaric' ? payment.amount : '') + '</td>' +
                        '<td>' + payment.paymentTypeName + '</td>' +
                        '<td>' + payment.currencyName + '</td>' +
                        '<td>' + payment.note + '</td>' +
                        '</tr>';

                    tableBody.append(newRow);
                });

                $("#totalIncome").text(response.totalIncome);
                $("#totalExpense").text(response.totalExpense);
                $("#overallBalance").text(response.overallBalance);
            },
            error: function(xhr, status, error) {
                console.log(xhr, status, error);
            }
        });
    });
</script>
</body>

</html>