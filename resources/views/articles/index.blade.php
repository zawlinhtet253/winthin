@extends('layouts.app')

@section('content')

<!-- Hero Section with BizLand Background Image -->
<section class="hero-bg">
    <div class="container text-white text-center">
        <h1 class="display-4 fw-bold">Win Thin & Associates</h1>
        <p class="lead mt-3">Work Together for Achievement</p>
        <a href="{{ url('/contact-us') }}" class="btn btn-warning btn-lg mt-4">Contact Us</a>
    </div>
</section>

<!-- About Section -->
<section class="py-5 bg-white" >
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">About Us</h2>
        </div>
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="fs-5 lh-lg">
                    Established in 1958, <strong>Win Thin & Associates</strong> is one of Myanmar’s leading audit firms.
                    We deliver high-quality audit and assurance services with a legacy of professional excellence and
                    deep industry knowledge.
                </p>
                <p class="fs-5 lh-lg">
                    Our services include Audit and Assurance, Business Valuation, and Financial & Tax Due Diligence.
                    We are committed to upholding integrity and transparency in every engagement.
                </p>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/home/Internal-Quality-Audit_-Complete-guide-on-procedure-of-internal-audit.jpg') }}"
                     alt="Audit Process" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Our Services</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <a href="{{ route('articles.service') }}" class="text-decoration-none text-dark">
                    <div class="bg-white p-4 border rounded text-center shadow-sm h-100 hover-shadow">
                        <i class="fas fa-balance-scale fa-2x text-primary mb-3"></i>
                        <h5 class="mb-2">Audit & Assurance</h5>
                        <p>Thorough audits and reports to ensure compliance and transparency in your financial practices.</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('articles.service') }}" class="text-decoration-none text-dark">
                    <div class="bg-white p-4 border rounded text-center shadow-sm h-100 hover-shadow">
                        <i class="fas fa-chart-line fa-2x text-primary mb-3"></i>
                        <h5 class="mb-2">Business Valuation</h5>
                        <p>Accurate valuations for mergers, acquisitions, and strategic business decisions.</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('articles.service') }}" class="text-decoration-none text-dark">
                    <div class="bg-white p-4 border rounded text-center shadow-sm h-100 hover-shadow">
                        <i class="fas fa-file-invoice-dollar fa-2x text-primary mb-3"></i>
                        <h5 class="mb-2">Financial & Tax Due Diligence</h5>
                        <p>Detailed due diligence to help you assess financial risks and ensure tax compliance.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Latest Insights</h2>
        </div>
        <div class="row g-4">
            @foreach($articles as $article)
                <div class="col-12 col-sm-6 col-md-4">
                <div class="card h-100 shadow-sm border-0 rounded-4 d-flex flex-column hover-shadow">
                    <div class="card-body d-flex flex-column">
                        <h5 class="fw-bold fs-5 text-dark">{{ $article->title }}</h5>
                        <hr class="mb-3">
                        <p class="text-muted flex-grow-1" style="min-height: 60px;">
                            {{ Str::limit(strip_tags($article->body), 120) }}
                        </p>
                    </div>
                    <div class="card-footer bg-white border-0 text-end">
                        @if(strlen($article->body) > 120)
                            <a href="{{ route('articles.insight_detail', $article->id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">Read More</a>
                        @endif
                    </div>
                </div>
            </div>  
            @endforeach    
        </div>
    </div>
</section>
@endsection
