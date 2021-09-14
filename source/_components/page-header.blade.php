<header class="page-header-ui page-header-ui-dark bg-img-cover overlay overlay-60"
        style="background-image: url('{{ $page->image }}')">
    <div class="page-header-ui-content">
        <div class="container px-5 text-center">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8">
                    <h1 class="page-header-ui-title mb-3">{{ $page->title }}</h1>
                    <p class="page-header-ui-text mb-0">{{ $page->description }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="svg-border-rounded">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none"
             fill="currentColor">
            <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path>
        </svg>
    </div>
</header>