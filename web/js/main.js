 $(document).ready(function() {

   $("form").submit(function(e) {
        e.preventDefault();
        var form = $(this);

        var url = form.attr("action");
        var formData = [];
        $(form).find("input[name]").each(function (index, node) {
            var positions = node.name.split('-');
            var row = parseInt(positions[0]);
            var column = parseInt(positions[1]);
            if (!formData[row]) {
                formData[row] = [];
            }

            formData[row][column] = node.value;
        });

        response = $.ajax({
            url: url,
            type: "post",
            data: {
               boardState: formData,
               // for now always assume the playe is 'X'
               playerUnit: "X"
            },
            success: function(data) {
                // json response is {"move":[2,0,"O"]}
                var move = data.move;
                var inputName = move[1] + "-" + move[0];
                $("input[name=" + inputName + "]").val(move[2]);
                $("input[name=" + inputName + "]").prop('disabled', true) ;
                $(".gameover").hide();
            },
            error: function() {
                $(".gameover").show();
            }
        });

    });
});