@extends('layout.app')
@php
use App\Config\UrlBase;
use App\Models\Category;
use App\Models\Product;
@endphp
<meta name="csrf-token" content="{{ csrf_token() }}">
@include('layout.header')
<section style="background-color: #eee;">
    <div class="text-center container py-5">
        <h4 class="mt-4 mb-5"><strong>{{Category::find($product[0]->category_id)->name}}</strong></h4>
        <div class="row">
            @foreach ($product as $item)
            <div class="col-lg-4 col-md-12 mb-4">
                <div class="card" style="padding-bottom:10px;">
                    <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                        data-mdb-ripple-color="light">
                        <img src="{{asset(UrlBase::getImageProduct($item->image))}}"
                            style="width:100px;height:100px;" />
                        <div style="width:100%;height:1px;background:black"></div>
                        <div style="height: 10px"></div>
                        <a href="#!">
                            <div class="mask">
                                <div class="d-flex justify-content-start align-items-end h-100">
                                    <h5><span class="badge bg-primary ms-2">{{$item->status==1?'Còn bán':'Hết
                                            hàng'}}</span></h5>
                                    @if ($item->promotion_sale!=0)
                                    <h5><span class="badge bg-danger ms-2">-{{$item->promotion_sale}}%</span></h5>
                                    @endif
                                </div>
                            </div>
                            <div class="hover-overlay">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </div>
                        </a>
                    </div>
                    <div class="card-body">
                        <a href="#" class="text-reset" style="text-decoration: none">
                            <h5 class="card-title mb-3">{{$item->name}}</h5>
                        </a>
                        <a href="#" class="text-reset" style="text-decoration: none">
                            <p>{{Category::find($product[0]->category_id)->name}}</p>
                        </a>
                        @if($item->promotion_sale!=0)
                        <div class="d-flex justify-content-center align-items-end h-100">
                            <h6 class="mb-3 text-decoration-line-through opacity-25">{{number_format($item->price,0, '',
                                ',')}} VND
                            </h6>
                            <div style="width:20px"></div>
                            <h6 class="mb-3">
                                {{number_format($item->price-($item->price*($item->promotion_sale/100)),0,'',',')}} VND
                            </h6>
                        </div>
                        @else
                        <h6 class="mb-3">{{number_format($item->price)}} VND</h6>
                        @endif
                    </div>

                    <div class="" d-flex justify-content-evenly"">
                        <a href="#" class="btn btn-primary active" role="button"
                            aria-pressed="true">@lang('mutilanguage.add_cart')</a>
                        <a href="{{route('detailProduct',['id'=>$item->ID])}}" class="btn btn-secondary active"
                            role="button" aria-pressed="true">@lang('mutilanguage.detail')</a>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<script>
    function showDetail(id){
            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
          const response= await fetch(`/product/detail/${id}`,{
          method : 'POST',
          headers: {
        "Content-Type": "application/json",
        "Accept": "application/json, text-plain, */*",
        "X-Requested-With": "XMLHttpRequest",
        "X-CSRF-TOKEN": token
        },
        credentials: "same-origin",
        body: JSON.stringify({
        id:id
        })
          )
        if(response.ok){
            console.log(response.json());
        }
        }
    }

   
    
</script>