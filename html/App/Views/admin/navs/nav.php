<!--<div class="flex-shrink-0 p-3 bg-white" style="width: 20%;">-->
<div class="flex-shrink-0 p-3 text-bg-dark admin-navigation" style="color: #fff;">
    <a href="/" class="d-flex align-items-center pb-3 mb-3 text-decoration-none border-bottom">
        <svg class="bi pe-none me-2" width="30" height="24">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-5 fw-semibold">Collapsible</span>
    </a>
    <ul class="list-unstyled ps-0">
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0" data-bs-toggle="collapse"
                    data-bs-target="#home-collapse" aria-expanded="true">
                Parks
            </button>
            <div class="collapse show" id="home-collapse" style="">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="<?= url('admin/parks') ?>" class=" d-inline-flex text-decoration-none rounded">List</a></li>
                    <li><a href="<?= url('admin/parks/create') ?>" class=" d-inline-flex text-decoration-none rounded">Create</a></li>
                </ul>
            </div>
        </li>
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                    data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                Cars
            </button>
            <div class="collapse" id="dashboard-collapse" style="">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="<?= url('admin/cars') ?>" class=" d-inline-flex text-decoration-none rounded">Car List</a></li>
                    <li><a href="<?= url('admin/cars/create') ?>" class=" d-inline-flex text-decoration-none rounded">Car Create</a></li>
                </ul>
            </div>
        </li>
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                    data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                Other temp
            </button>
            <div class="collapse" id="orders-collapse" style="">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class=" d-inline-flex text-decoration-none rounded">temp 1</a></li>
                    <li><a href="#" class=" d-inline-flex text-decoration-none rounded">temp 2</a></li>
                </ul>
            </div>
        </li>
        <li class="border-top my-3"></li>
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                    data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                Account
            </button>
            <div class="collapse" id="account-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="<?= url('logout') ?>" class="d-inline-flex text-decoration-none rounded">Logout</a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>
