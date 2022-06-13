$(document).ready(function() {
    $(function() {
        var interval = $('#course option').clone();
        $('#courselist').on('change', function() {
            var val = this.value;
            $('#course').html(
                interval.filter(function() {
                 return this.value.indexOf( val + '_' ) === 0;
            })
        );
    })
    .change();
});
});
