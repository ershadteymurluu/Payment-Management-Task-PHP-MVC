<h2>Ödəniş əlavə et</h2>

<div id="message"></div>
<form id="addPaymentForm">
    <div class="mb-3">
        <label for="amount" class="form-label">Ödəniş Məbləği</label>
        <input type="number" class="form-control w-50" id="amount" name="amount">
        <div class="invalid-feedback"></div>
    </div>
    <div class="mb-3">
        <label for="category" class="form-label">Kateqoriya</label>
        <select class="form-select w-50" id="category" name="category">
            <option value="">Kateqoriya seçin</option>
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
            <?php endforeach; ?>
        </select>
        <div class="invalid-feedback"></div>
    </div>
    <div class="mb-3">
        <label for="currency" class="form-label">Valyuta</label>
        <select class="form-select w-50" id="currency" name="currency">
            <option value="">Valyuta seçin</option>
            <?php foreach ($currencies as $currency) : ?>
                <option value="<?php echo $currency->id; ?>"><?php echo $currency->name; ?></option>
            <?php endforeach; ?>
        </select>
        <div class="invalid-feedback"></div>
    </div>
    <div class="mb-3">
        <label for="type" class="form-label">Ödəniş Növü</label>
        <select class="form-select w-50" id="type" name="type">
            <option value="">Ödəniş növünü seçin</option>
            <option value="mədaxil">Mədaxil</option>
            <option value="məxaric">Məxaric</option>
        </select>
        <div class="invalid-feedback"></div>
    </div>
    <div class="mb-3">
        <label for="comment" class="form-label">Rəy</label>
        <textarea class="form-control w-50" id="comment" name="comment" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Əlavə et</button>
</form>