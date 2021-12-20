<div class="row">
    <div class="col-md-12">
        <ul class="breadcrumbs-alt">
            <?php $count = isset($breadcrumbs) ? count($breadcrumbs): 0; $i=1;?>
            @if($count>0)
                @foreach ($breadcrumbs as $breadcrumb)
                    <li>
                        <a class="{{$count==$i ? 'current' : ''}}" href="{{$breadcrumb['link']}}">{{$breadcrumb['title']}}</a>
                    </li>
                <?$i++;?>
                @endforeach
            @endif
        </ul>
    </div>
</div>