@extends('layouts.app')
<style>
    .source {
        display: none !important;
        background: none !important;
        color: #fff !important;
    }

</style>

@section('content')
    <div class="flex items-center  bg-gray-100 dark:bg-gray-900">
        <div class="container max-w-3x3 px-1 mx-auto my-2">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <iframe src="http://saralnepali.com/widgets/current-nepali-time-and-date-widget.php" frameborder="0"
                        scrolling="no" marginwidth="0" marginheight="0"
                        style="border:none; overflow:hidden;width:100%;height:30px" allowtransparency="true"></iframe>

                    <iframe src="http://saralnepali.com/widgets/nepali-calendar.php" frameborder="0" scrolling="no"
                        marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:100%;height:1200px"
                        allowtransparency="true"></iframe>
                </div>
                <!-- ... -->
                <div>
                    <iframe src="http://saralnepali.com/widgets/nepali-rashifal.php " frameborder="0" scrolling="no"
                        marginwidth="0" marginheight="0"
                        style="border:none; overflow:hidden; width:100%;max-width:800px;height:4000px"
                        allowtransparency="true"></iframe>
                </div>
            </div>

        </div>
    </div>
@endsection
