<div class="container">
    <h2>Add Service</h2>
    <?= validation_errors(); ?>
    <?= form_open('service/add'); ?>
        <label>Name</label>
        <input type="text" name="name" required>
        <label>Price</label>
        <input type="text" name="price" required>
        <button type="submit">Add</button>
    </form>
</div>
