<!--<div class="flex-shrink-0 p-3 bg-white" style="width: 20%;">-->
<div class="flex-shrink-0 p-3 text-bg-dark admin-navigation" style="color: #fff;">
    <a href="/" class="d-flex align-items-center pb-3 mb-3 text-decoration-none border-bottom">
        <svg class="bi pe-none me-2" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-5 fw-semibold">Collapsible</span>
    </a>
    <ul class="list-unstyled ps-0">
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                Home
            </button>
<!--            <div class="collapse show" id="home-collapse">-->
            <div class="collapse show" id="home-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="d-inline-flex text-decoration-none rounded">Overview</a></li>
                    <li><a href="#" class="d-inline-flex text-decoration-none rounded">Updates</a></li>
                    <li><a href="#" class="d-inline-flex text-decoration-none rounded">Reports</a></li>
                </ul>
            </div>
        </li>

        <li class="border-top my-3"></li>
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
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