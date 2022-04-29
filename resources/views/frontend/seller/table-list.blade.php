

 @if(!empty($rfqlist))

<table id="customers">
    <tr>
        <th>{{lang('PRODUCTS')}}</th>
        <th>{{lang('CATEGORY')}}</th>
        <th>{{lang('QUENTITY')}}</th>
        <th>{{lang('SOURCE')}}</th>
        <th>{{lang('DATE')}}</th>
        <th>{{lang('ACCEPT')}}</th>
    </tr>

        @foreach($rfqlist as $li)

        <tr>
            <td>{{$li->rfq_product_name}} </td>
            <td>{{$li->rfq_product_categories}} </td>
            <td>{{$li->rfq_Quantity}} </td>
            <td>{{$li->rfq_Sourcing}} </td>
            <td>{{$li->rfq_createdatetime}} </td>
            <td>
            @if($li->rfq_accerpt_userid!="")
            {{lang('ACCEPTED')}}
            @else
                  
            <div>
                <button class="aceept-button" onclick="window.location.href='{{url('acept-rfq-request/'.$li->rfq_id)}}'">
                {{lang('ACCEPT')}}
                </button>
            </div>
            @endif
            </td>
            
            </tr>

        @endforeach
   

</table>

@else
<div class="col-12 col-xs-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 reducewidth no-records">
    <div>No Records Found</div>
 </div>

@endif
<div class="row">
    <br/>
    <div class="col-12  right-side-column">
          {{ $rfqlist->links('frontend.common.pagination') }}
    </div>
</div>


<script>
function sent_request(){
    if(confirm('Are you sure, you want to accept it?'))
   return window.location.href='{{url('acept-rfq-request/'.$li->rfq_id)}}';

}
</script>