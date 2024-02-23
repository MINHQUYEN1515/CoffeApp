@php
use App\Config\UrlBase;
@endphp

<style>
    .select:hover {
        cursor: pointer;

    }

    .select_image:hover {

        animation: select_card .2s steps(5) forwards;
    }

    @keyframes select_card {
        to {
            transform: scale(1.1)
        }
    }

    @keyframes card {
        0% {
            width: 0px;
        }

        100% {
            width: 100%;
        }
    }
</style>
<div class="container">
    <div class="d-flex justify-content-center align-items-center mt-5">
        <strong>@lang('mutilanguage.browse_category')</strong>
        <div style="width:5px"></div>
        <div style=" width:1200px;height:1px;background-color:black;"></div>
    </div>
    <div class="row mt-2 g-4">

        @foreach ($category as $item)
        <div class="col-md-3 select" onclick="show()">
            <form action="{{route('productCategory',['id'=>$item->ID])}}" method="get">
                <div class="card p-1 select ">
                    <div class=" d-flex flex-column justify-content-center p-2">
                        <div class="d-flex justify-content-center"> <img class="select_image"
                                style="align-content: center;" src="{{asset(UrlBase::getImageCategory($item->image))}}"
                                height="100" width="100" />
                        </div>
                        <div style="text-align: center;"> <strong>{{$item->name}} </strong> </div>
                        <div style="height:20px"></div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">@lang('mutilanguage.see_more')</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        @endforeach

    </div>
    <script>
        function show(){
            console.log(1)
        }
    </script>
</div>