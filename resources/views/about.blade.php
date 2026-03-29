@extends('layouts.app')

{{--@push('styles')--}}
{{--    <link href="{{ asset('css/item.css') }}" rel="stylesheet" />--}}
{{--    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet" />--}}
{{--@endpush--}}

@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="display-5 fw-bolder">O nas</h1>
                    <p class="lead">
                        Jesteśmy oficjalnym przedstawicielem Apple w Polsce. Nasza misja to dostarczanie najwyższej jakości produktów Apple oraz wyjątkowej obsługi klienta. Od lat zapewniamy naszym klientom dostęp do najnowszych technologii Apple, profesjonalne doradztwo oraz kompleksowe wsparcie techniczne.
                    </p>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 mt-5">
                <div class="col-lg-4 mb-3">
                    <div class="card py-5 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Kontakt</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">naszsklep@email.pl</div>
                            <div class="small text-black-50">531-976-852</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="card py-5 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Adres</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">Katedra Informatyki Politechnika Lubelska</div>
                            <div class="small text-black-50">ul. Nadbystrzycka 36B 20-618 Lublin</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="card py-3 h-100">
                        <div class="card-body text-center">
                            <div id="mapka" style="width: 340px; height: 250px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyBvhXKnsQEQgivUZLqwzIv-aoaOb_kg3nc&callback=initMap"></script>
    <script>
        function initMap() {
            var location = {lat: 51.2465, lng: 22.5684}; // Współrzędne Politechniki Lubelskiej
            var map = new google.maps.Map(document.getElementById('mapka'), {
                zoom: 15,
                center: location
            });
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
        }
    </script>
@endpush
