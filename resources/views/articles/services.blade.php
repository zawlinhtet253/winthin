@extends('layouts.app')

@section('content')
<div class="container px-3 px-md-5">
    <div class="text-center my-5">
        <h1 class="fw-bold">Our Services</h1>
        <p class="fs-5 mx-auto" style="max-width: 800px;">
            At Win Thin & Associates, we are dedicated to offering a broad array of high-quality services tailored to meet the needs of our clients. Our team of experienced professionals provides comprehensive solutions with integrity and expertise.
        </p>
    </div>

    <div class="row g-4">
        <!-- Audit & Assurance -->
        <div class="col-md-6">
            <div class="card shadow h-100">
                <img src="{{asset('images/services/Auditing-and-Assurance.jpeg')}}" class="card-img-top service-img" alt="Audit and Assurance" >
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-balance-scale text-primary me-2"></i>Audit and Assurance</h5>
                    <p class="card-text">Rigorous audits that offer clarity on financial status and promote confident decision-making.</p>
                </div>
            </div>
        </div>

        <!-- Business Valuation -->
        <div class="col-md-6">
            <div class="card shadow h-100">
                <img src="{{asset('images/services/Business_Valuation.png')}}" class="card-img-top service-img" alt="Business Valuation" >
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-chart-line text-primary me-2"></i>Business Valuation</h5>
                    <p class="card-text">Accurate business valuations for strategic planning, M&A, and dispute resolution.</p>
                </div>
            </div>
        </div>

        <!-- Financial & Tax Due Diligence -->
        <div class="col-md-6">
            <div class="card shadow h-100">
                <img src="{{asset('images/services/Financial & Tax Due Diligence.jpg')}}" class="card-img-top service-img" alt="Due Diligence" >
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-file-invoice-dollar text-primary me-2"></i>Financial & Tax Due Diligence</h5>
                    <p class="card-text">Comprehensive due diligence to assess risk, verify data, and ensure tax compliance.</p>
                </div>
            </div>
        </div>

        <!-- Internal Audit & Risk Management -->
        <div class="col-md-6">
            <div class="card shadow h-100">
                <img src="{{asset('images/services/risk_management.jpg')}}" class="card-img-top service-img"  alt="Risk Management">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-shield-alt text-primary me-2"></i>Internal Audit & Risk Management</h5>
                    <p class="card-text">Identify and mitigate internal risks with professional internal audit practices.</p>
                </div>
            </div>
        </div>

        <!-- Agreed-upon Procedures -->
        <div class="col-md-6">
            <div class="card shadow h-100">
                <img src="{{asset('images/services/Agreed-upon-Procedures.jpg')}}" class="card-img-top service-img"  alt="Agreed Procedures">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-tasks text-primary me-2"></i>Agreed-upon Procedures</h5>
                    <p class="card-text">Custom financial procedures to provide assurance on selected business areas.</p>
                </div>
            </div>
        </div>

        <!-- Review Engagement -->
        <div class="col-md-6">
            <div class="card shadow h-100">
                <img src="{{asset('images/services/Review Engagement.jpg')}}" class="card-img-top service-img"  alt="Review Engagement">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-clipboard-check text-primary me-2"></i>Review Engagement</h5>
                    <p class="card-text">Professional review services offering moderate assurance of your financial reports.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-5 fs-5">
        <p>
            In all our services, we adhere to the highest standards of professionalism and quality, aiming to exceed expectations.
        </p>
    </div>
</div>
@endsection
<!-- <div class="container px-3 px-md-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Services</h1>

                <div class="mx-auto mt-5 mb-3 fs-4" style="max-width: 800px;">
                    <p>
                        At Win Thin & Associates, we are dedicated to offering a broad array of high-quality services tailored to meet the needs of our clients. Our team of experienced professionals leverages their extensive knowledge and expertise to ensure we provide comprehensive solutions. Below are some of the key services we offer:
                    </p>

                    <p class="mt-4">
                        <strong>Audit and Assurance:</strong> Our firm provides rigorous audit and assurance services designed to provide a clear perspective of your financial status and operational efficiency. We strive to deliver a thorough, unbiased analysis that promotes confidence and informed decision-making.
                    </p>

                    <p class="mt-4">
                        <strong>Business Valuation:</strong> We offer professional business valuation services aimed at providing a clear and accurate assessment of your company’s worth. Whether for merger and acquisition considerations, shareholder disputes, or strategic planning, we provide detailed reports that illuminate the true value of your business.
                    </p>

                    <p class="mt-4">
                        <strong>Financial & Tax Due Diligence:</strong> Our team conducts meticulous financial and tax due diligence to help clients navigate transactions with confidence. We evaluate potential financial risks and opportunities, verify facts, and ensure compliance with tax laws, providing clients with the insight needed to make informed decisions.
                    </p>

                    <p class="mt-4">
                        <strong>Internal Audit and Risk Management:</strong> Our internal audit and risk management services are designed to enhance your organization’s operations. We help identify potential risks and implement mitigation strategies, ensuring your internal processes are robust and efficient.
                    </p>

                    <p class="mt-4">
                        <strong>Agreed-upon Procedures:</strong> As part of our agreed-upon procedures service, we perform specific procedures on financial statements as per the agreement with the client. This can provide a valuable assurance to the client or third parties about specific aspects of your business operations or financial information.
                    </p>

                    <p class="mt-4">
                        <strong>Review Engagement:</strong> Our review engagement service offers a moderate level of assurance about your financial statements. Through inquiry and analytical procedures, we provide a professional opinion on whether your financial statements are in accordance with applicable financial reporting frameworks.
                    </p>

                    <p class="mt-4">
                        In all our services, we adhere to the highest standards of professionalism, integrity, and quality, aiming to add value and exceed client expectations.
                    </p>
                </div>
            </div>
        </div>
    </div> -->
