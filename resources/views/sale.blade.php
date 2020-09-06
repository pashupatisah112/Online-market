
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{asset('css/sale.css')}}">
<script src="{{asset('js/sale.js')}}"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- subscribe Modal -->

<div class="modal fade text-center py-5 subscribeModal-lg"  id="subscribeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content">
            <div class="modal-body">
				<div class="top-strip"></div>
                <a class="h2" href="" target="_blank"> <i class="fa fa-bullhorn"></i> {{$sale->days}} Days Sale !!!</a>
                <h3 class="pt-5 mb-0 text-secondary"><i class="fa fa-map-marker"></i> City: {{$sale->city->city}} </h3>
                <h4 class="pb-1 text-muted">{{$sale->product_desc}}</h4>
                <p class="pb-1 text-muted"><small>Loation: {{$sale->location}}</small></p>
            </div>
        </div>
    </div>
</div>