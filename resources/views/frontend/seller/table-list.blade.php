


<table id="customers">
    <tr>
        <th>PRODUCT</th>
        <th>CATEGORIES</th>
        <th>QUENTITY</th>
        <th>SOURCE</th>
        <th>DATE</th>
        <th>ACCEPT</th>
    </tr>

    @if(!empty($rfqlist))
        @foreach($rfqlist as $li)

        <tr>
            <td>{{$li->rfq_product_name}} </td>
            <td>{{$li->rfq_product_categories}} </td>
            <td>{{$li->rfq_Quantity}} </td>
            <td>{{$li->rfq_Sourcing}} </td>
            <td>{{$li->rfq_createdatetime}} </td>
            <td>
            @if($li->rfq_accerpt_userid!="")
                Accepted
            @else
                    Accept
            @endif
            </td>
            
            </tr>

        @endforeach
    @endif

</table>


<div class="row">
    <br/>
    <div class="col-12  right-side-column">
          {{ $rfqlist->links('frontend.common.pagination') }}
    </div>
</div>