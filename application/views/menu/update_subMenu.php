<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-5 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Update Sub Menu</h1>
                        </div>
                        <form action="<?= base_url('menu/update_subMenu/') . $subMenu['id']; ?>" method="post">
                            <input type="hidden" value="<?= $subMenu['id']; ?>" name="id">
                            <div class="modal-body">
                                <div class="form-grup">
                                    <select name="menu_id" id="menu_id" class="form-control">
                                        <?php foreach ($menu as $m) : ?>
                                            <?php if ($m['id'] == $subMenu['menu_id']) : ?>
                                                <option value="<?= $m['id']; ?>" selected><?= $m['menu']; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control mt-2" id="title" name="title" value="<?= $subMenu['title']; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control mt-2" id="url" name="url" value="<?= $subMenu['url']; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control mt-2" id="icon" name="icon" value="<?= $subMenu['icon']; ?>">
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                        <label class="form-check-label" for="is_active">
                                            Active?
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <a href="<?= base_url('menu/submenu'); ?>" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<!-- End of Main Content -->