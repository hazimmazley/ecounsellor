<script>
    $(document).ready(function(){
    
      $("#findBtn").click(function(){
        var prog = $("#programID").val();
        var fieldname = $('#fieldName').val();
        alert(prog);
        $.ajax({
          type: 'get',
          dataType: 'html',
          url: '{{url('/filtercourse')}}',
          data: 'program_id=' + prog + '&field=' + fieldname,
          success:function(response){
            console.log(response);
            $("#productData").html(response);
          }
        });
    
    
      });
    
    });
    </script>