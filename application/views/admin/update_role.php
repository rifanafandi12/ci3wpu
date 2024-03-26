<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-5 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Update Role</h1>
                        </div>
                        <form class="user" method="post" action="<?= base_url('admin/update_role/'); ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control" id="role" name="role" value="<?= $role['role']; ?>">
                                <input type="hidden" name="id" value="<?= $role['id']; ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                            <a href="<?= base_url('admin/role'); ?>" class="btn btn-secondary">Close</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<!-- End of Main Content -->