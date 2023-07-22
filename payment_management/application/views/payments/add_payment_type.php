<h2>Ödəniş növü əlavə edin</h2>
<div id="message"></div>
<form id="addPaymentTypeForm" method="post">
    <div class="mb-3">
        <label for="paymentType" class="form-label">Ödəniş Növü</label>
        <?php
        $data = array(
            'name' => 'name', 
            'id' => 'paymentType',
            'class' => 'form-control w-50'
        );
        echo form_input($data);
        ?>
        <div id="emailHelp" class="form-text">Buraya uyğun ödəniş növünü qeyd edin.</div>
        <div class="text-danger" id="nameError"></div>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Əlavə Et</button>
</form>


