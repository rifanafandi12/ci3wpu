<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger mb-2">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#NewMenuModalSubmenu">Add New Submenu</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Title</th>
                        <th scope="col">URL</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($subMenu as $sm) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $sm['menu']; ?></td>
                            <td><?= $sm['title']; ?></td>
                            <td><?= $sm['url']; ?></td>
                            <td><?= $sm['icon']; ?></td>
                            <td><?= $sm['is_active']; ?></td>
                            <td>
                                <a href="<?= base_url('menu/update_subMenu/' . $sm['id']); ?>" class="btn btn-success">Edit</a>
                                <a href="<?= base_url('menu/delete_sub_menu/' . $sm['id']); ?>" onclick="return confirm('Apakah Anda yakin mau menghapus Kategori Ini?');" class="btn btn-danger">Delete</a>
                                <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urldecode($token) . '"></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- modal -->

<!-- Modal -->
<div class="modal fade" id="NewMenuModalSubmenu" tabindex="-1" role="dialog" aria-labelledby="NewMenuModalSubmenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="NewMenuModalSubmenuLabel">Add Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control mt-2" id="title" placeholder="subMenu title" name="title">
                    </div>
                    <div class="form-grup">
                        <select name="menu_id" id="menu_d" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control mt-2" id="url" placeholder="subMenu url" name="url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control mt-2" id="icon" placeholder="subMenu icon" name="icon">
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->