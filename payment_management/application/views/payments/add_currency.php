<h2>Valyuta daxil edin</h2>
<div id="message"></div>
<form id="addCurrencyForm" method="post">
    <div class="mb-3">
        <label for="currency" class="form-label">Valyuta</label>
        <?php
        $data = array(
            'name' => 'name', 
            'id' => 'currency',
            'class' => 'form-control w-50'
        );
        echo form_input($data);
        ?>
        <div id="emailHelp" class="form-text">Buraya valyutanı qeyd edin.</div>
        <div class="text-danger" id="nameError"></div>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Daxil et</button>
</form>