<!-- Modal -->
<div class="modal fade" id="bookingFormModal" tabindex="-1" role="dialog" aria-labelledby="bookingFormModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">

                <button class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times"></i>
                </button>


                <div class="body-wrapper">

                    <img class="icon" src="{!! url('/') !!}/assets/frontend/images/send-email-icon.png" alt="Send Email Icon">

                    <h3 class="title">Thankyou for booking the course</h3>

                    <p class="summary">
                        check your email within 2x24 hours,<br>
                        we will send you approval letter
                    </p>


                    <a href="{!! route('home') !!}" class="text-btn small">BACK TO HOME <i class="fa fa-long-arrow-right"></i></a>


                    <p class="small-text">or visit us on:</p>


                    <ul class="share-wrapper">
                        <li class="item">
                            <a href="#">
                                <i class="fa fa-facebook fb-hover"></i>
                            </a>
                        </li>
                        <li class="item">
                            <a href="#">
                                <i class="fa fa-instagram ig-hover"></i>
                            </a>
                        </li>
                    </ul>

                </div>



            </div>

        </div>
    </div>
</div>