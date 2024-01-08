@extends('layouts.app-landing-page')
@section('content')
        <div class="tabs-wrapper">
            <div class="section-title text-center">
                <h2 style="border-radius: 16px;
                background: var(--Kuning, #FFC928);" class="title p-1">Bantuan</h2>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active show" id="design" role="tabpanel" aria-labelledby="design-tab">
                <div id="accordionsing" class="faq faq-two pixFade">
                    @forelse ($faqs as $faq)
                    <div class="card">
                        <div class="card-header" id="heading10">
                            <h5>
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse00" aria-expanded="false" aria-controls="collapse00">
                                   {{$faq->question}}
                                </button>
                            </h5>
                        </div>
                        <div id="collapse00" class="collapse" aria-labelledby="heading10" data-parent="#accordionsing" style="">
                            <div class="card-body">
                                <p>
                                   {{$faq->answer}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center col-12">
                        <div class="d-flex justify-content-center" style="min-height:16rem">
                            <div class="my-auto">
                                <img src="{{ asset('no-data.png') }}" width="300" height="300" />
                                <h4 class="text-center mt-4">Bantuan Kosong!!</h4>
                            </div>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
@endsection
