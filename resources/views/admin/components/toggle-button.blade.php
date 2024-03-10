<style>
    /* Basic Rules */
    .switch input {
        display: none;
    }

    .switch {
        display: inline-block;
        width: 40px;
        height: 20px;
        margin: 8px;
        transform: translateY(50%);
        position: relative;
    }

    /* Style Wired */
    .slider {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        border-radius: 30px;
        box-shadow: 0 0 0 2px #777, 0 0 4px #777;
        cursor: pointer;
        border: 4px solid transparent;
        overflow: hidden;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        width: 100%;
        height: 100%;
        background: #777;
        border-radius: 30px;
        transform: translateX(-20px);
        transition: .4s;
    }

    input:checked+.slider:before {
        transform: translateX(20px);
        background: limeGreen;
    }

    input:checked+.slider {
        box-shadow: 0 0 0 2px limeGreen, 0 0 2px limeGreen;
    }

    /* Style Flat */
    .switch.flat .slider {
        box-shadow: none;
    }

    .switch.flat .slider:before {
        background: #FFF;
    }

    .switch.flat input:checked+.slider:before {
        background: white;
    }

    .switch.flat input:checked+.slider {
        background: limeGreen;
    }
</style>
<div>
    <label class="switch" for="{{ $toggleId }}">
        <input type="checkbox" id="{{ $toggleId }}" {{ $checked }}>
        <span class="slider"></span>
    </label>
</div>
{{-- <div class="form-check form-switch">
    <input type="checkbox" class="form-check-input" >
    <label class="form-check-label" ></label>
</div> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('#{{ $toggleId }}').change(function() {
            var isActive = $(this).is(':checked') ? 1 : 0;
            $.ajax({
                url: "{{ $route }}",
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    isActive: isActive
                },
                success: function(response) {
                    // Optionally handle success response
                    console.log(response);
                    toastr.success(response.success);
                },
                error: function(xhr) {
                    // Optionally handle error response
                    toastr.error(xhr.responseJSON.error);
                }
            });
        });
    });
</script>
