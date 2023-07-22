<form id="paymentTableFilter" class="mb-5">
    <div class="d-flex gap-2">
        <div class="d-flex">
            <select class="form-select" style="width: 200px;" id="currency" name="currency">
                <option value="">Valyuta seçin: </option>
                <?php foreach ($currencies as $currency) : ?>
                    <option value="<?php echo $currency->id; ?>"><?php echo $currency->name; ?></option>
                <?php endforeach; ?>
            </select>

            <select class="form-select" style="width: 200px;" id="category" name="category">
                <option value="">Kategori seçin: </option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Axtarış et</button>
    </div>

</form>

<table class="table table-bordered ">
    <thead>
        <tr>
            <th scope="col">Məbləğ (Mədaxil)</th>
            <th scope="col">Məbləğ (Məxaric)</th>
            <th scope="col">Kategoriya</th>
            <th scope="col">Valyuta</th>
            <th scope="col">Rəy</th>
        </tr>
    </thead>
    <tbody id="paymentTableBody">
        <?php foreach ($payments as $payment) : ?>
            <tr>
                <td><?php echo ($payment['type'] === 'mədaxil') ? $payment['amount'] : ''; ?></td>
                <td><?php echo ($payment['type'] === 'məxaric') ? $payment['amount'] : ''; ?></td>
                <td><?php echo $payment['paymentTypeName'] ?></td>
                <td><?php echo $payment['currencyName']; ?></td>
                <td><?php echo $payment['note']; ?></td>
            </tr>
        <?php endforeach; ?>


    </tbody>
</table>

<!-- Yekun mebleg, medaxil ve mexaric ucun -->

<table class="table table-borderless">
    <thead>
        <tr>
            <th scope="col">Yekun Məbləğ (Mədaxil)</th>
            <th scope="col">Yekun Məbləğ (Məxaric)</th>
            <th scope="col">Qaliq</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td id="totalIncome"><?php echo number_format($totalIncome, 2); ?></td>
            <td id="totalExpense"><?php echo number_format($totalExpense, 2); ?></td>
            <td id="overallBalance"><?php echo number_format($overallBalance, 2); ?></td>
        </tr>

    </tbody>
</table>