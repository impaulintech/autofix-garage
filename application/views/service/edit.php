<div class="container">
    <h2>Edit Service</h2>
    <?= validation_errors(); ?>
    <?= form_open('service/edit/' . $service->id); ?>
        <label>Name</label>
        <input type="text" name="name" value="<?= set_value('name', $service->name); ?>" required>
        <label>Price</label>
        <input type="text" name="price" value="<?= set_value('price', $service->price); ?>" required>
        <button type="submit">Update</button>
    </form>
</div>
