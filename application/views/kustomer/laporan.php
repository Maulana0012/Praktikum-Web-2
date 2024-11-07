<main>
    <div class="container-fluid px-4">
        <h1 class="nt-4"></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo site_url('user') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ol>
        <div class="card -4">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="card mb-4">
                    <div class="card-body">
                        <form class="form-horizontal" method="post"
                            action="<?php echo base_url("report/laporankustomer") ?>" target="_blank">
                            <div class="nb-3">
                                <label for="exampleInputEmaill" class="form-label">Internal file Controller: Menyertakan
                                    report pada file controller</label>
                            </div>
                            <button type="submit" class="btn btn-warning">Cetak Laporan</button>
                        </form>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <form class="form-horizontal" method="post"
                            action="<?php echo base_url('report/laporankustomerheader') ?>" target="_blank">
                            <div class="ab-3">
                                <label for="exampleInputEmaill" class="form-label">Internal file Controller: Menyertakan
                                    report hanya header pada file controller</label>
                            </div>
                            <button type="submit" class="btn btn-warning">Cetak Laporan</button>
                        </form>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <form class="form-horizontal" method="post"
                            action="<?php echo base_url('report/laporankustomerfull') ?>" target="_blank">
                            <div class="nb-3"><label for="exampleInputEmaili" class="form-label"> Ekternal file
                                    Controller: Meyertakan report pada file berbeda dan diletakan di folder view</label>
                            </div>
                            <button type="submit" class="btn btn-warning Cetak laporankustomerbuttons">Cetak
                                Lapotan</button>
                        </form>
                    </div>
                    <div>
                        <div class=" card mb-4">
                            <div class="card-body">
                                <form class="form-horizontal" method="post"
                                    action="<?php echo base_url('report/laporankustomerkustom') ?>" target="_blank">
                                    <div class="mb-3">
                                        <label for="exampleInputEmaili" class="form-label">Costom Ekternal file
                                            Controller: Meyertakan report pada file berbeda dan diletakan di folder view
                                            berdasarkan fungsi</label>
                                    </div>
                                    <button type="submit" class="btn btn-warning"> Cetak Laporan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>