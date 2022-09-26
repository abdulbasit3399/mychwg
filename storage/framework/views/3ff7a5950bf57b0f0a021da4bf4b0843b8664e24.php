<div class="demo-panel dp-right right-panel position-fixed">

  <div class="demo-panel-trigger bg-success" style="width: 130px;">

    Care to Donate?


  </div>

  <div class="demo-panel-inner" style="float:right">

    

    <div class="demo-panel-content">



      <div id="custom_single_page">

        <div class="container2" onload="initialLook()">

          <div class="form-content">

            <div id="popupWait" ><b></b></div>

            <div class="donate-form">



              <form action="<?php echo e(route('donate.amount')); ?>" method="post">

                <?php echo csrf_field(); ?>

                <div class="content-inner-section pb-5">
                  <div class="amount-section mb-3">
                    <h5><b>Donate to help Homeopathy and Miasmatic treatments</b></h5>
                    <p style="color:#00000080"><b>We use every donation to help Homeopathy in communities around Canada.</b></p>
                    <br/>
                    <br/>
                    <p><b><i>How much would you like to donate?</i></b></p>
                    <div class="mb-2">
                      <div class="row">
                        <div class="col-sm-3 mb-2 pr-1"><a class="btn btn-payment-append">$5</a></div>
                        <div class="col-sm-3 mb-2 pr-1"><a class="btn btn-payment-append">$20</a></div>
                        <div class="col-sm-3 mb-2 pr-1"><a class="btn btn-payment-append">$100</a></div>
                        <div class="col-sm-3 mb-2">
                          <input type="number" min="11" class="form-control custom-donation-entry" style="font-size: 15px;" placeholder="Custom">
                        </div>
                      </div>
                    </div>
                    <input type="hidden" min="5" required="" class="form-control donation-amount" readonly name="price" placeholder="10">
                  </div>
                  <div class="wrapper-payemnt-choose">
                    <input type="radio" name="payment_type" id="option-1" checked required="" value="one_time">
                    <input type="radio" name="payment_type" id="option-2" class="form-control" value="monthly">
                    <label for="option-1" class="option option-1">
                      <div class="dot"></div>
                      <span>One Time</span>
                    </label>
                    <label for="option-2" class="option option-2">
                      <div class="dot"></div>
                      <span>Monthly</span>
                    </label>
                  </div>
                  <button type="submit" class="btn btn-dark pull-right" style="background-color: #50b86a;border-color: #50b86a;">Donate</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>

<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/front/components/donation_bar.blade.php ENDPATH**/ ?>