
<tr id="<?=$_POST['length']?>">
    <td><?=$_POST['length']?></td>


    <td>
        <input type="text" class="form-control " name="title[]" id="title">

    </td>
    <td>
        <input type="text" class="form-control "  name="details[]" id="details">
    </td>
    <td>
        <a href="#" onclick="deleteRow(<?=$_POST['length']?>)">
            <i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a>

    </td>

</tr>


<script>
    function deleteRow(id){
        $("#" + id).remove();
    }
</script>
