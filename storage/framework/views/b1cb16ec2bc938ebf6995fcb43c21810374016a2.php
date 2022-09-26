<?php $__env->startSection('title', $user->name); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>











<div id="user-profile">

    <section id="profile-info">

        <div class="row pb-5 px-4">

    <div class="col-md-12 mx-auto">

                <a href="<?php echo e(route('social.index')); ?>">

                    <div class=" goto-back-section" >

                        Go to Newsfeed

                    </div>

                </a>

        <!-- Profile widget -->

        <div class="">

            <div class="px-4 pt-0 pb-4 cover-profile" style="background-image: url('<?php echo e(asset($user->userSocialProfile->cover ?? '')); ?>');">

                <div class="media align-items-end profile-head">

                    <div class="profile mr-3 mb-2"><img src="<?php echo e(asset($user->avatar)); ?>" alt="<?php echo e($user->name); ?>" width="130" class="rounded mb-2 img-thumbnail">

                    </div>





                    <div class="media-body mb-5 text-white">

                        <h4 class="mt-0 mb-0"><span class="bg-dark px-1 text-white" style="opacity: 0.9;"><?php echo e($user->name); ?></span></h4>

                        <p class="small mb-4"> <i class="fas fa-info-circle mr-1"></i><?php echo e($user->userSocialProfile->caption ?? ''); ?></p>

                    </div>

                </div>

            </div>



            <div class="">



                        <div class="row">







                            <div class="col-sm-9 mt-2">

                                <?php echo $__env->make('vendor.social-network.connection.user_profile_tabs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            </div>





                                <div class="col-sm-3 mt-2">

                                    <div class="card">



                                        <div class="card-body text-center">



                                        <div class="v-box1 text-center">



                                            <div class="item" style="background-color: #82f195;">

                                                <div>

                                                    <span class="txt20"><?php echo e(count($user->socialPosts) ?? 0); ?></span><br>

                                                    <span class="txt9">Posts</span>

                                                </div>

                                            </div>

                                            <div class="item" style="background-color: #6ecdf1;">

                                                <div>

                                                    <span class="txt20"><?php echo e(count($user->userFollowers) ?? 0); ?></span><br>

                                                    <span class="txt9">Members</span>

                                                </div>

                                            </div>

                                            <div class="item" style="background-color: #D4B89B;">

                                                <div>

                                                    <span class="txt20"><?php echo e(badgesInformation($user->id)['articals']??0); ?></span><br>

                                                    <span class="txt9">Articles</span>

                                                </div>

                                            </div>



                                        </div>

                                        <div class="v-box1 text-center">



                                            <div class="item" style="background-color: #ADBEEA;">

                                                <div>

                                                    <span class="txt20"><?php echo e(badgesInformation($user->id)['events']??0); ?></span><br>

                                                    <span class="txt9">Events </span>

                                                </div>

                                            </div>

                                            <div class="item" style="background-color: #B1D09D;">

                                                <div>

                                                    <span class="txt20"><?php echo e(count($user->socialPosts) ?? 0); ?></span><br>

                                                    <span class="txt9">Attended Events </span>

                                                </div>

                                            </div>



                                            <div class="item" style="background-color: #F2F2F2;">

                                                <div>

                                                    <span class="txt20"><?php echo e($user->created_at->diffForHumans()); ?></span><br>

                                                    <span class="txt9"> </span>

                                                </div>

                                            </div>





                                        </div>




                                        <?php if(Auth::user()->id != $user->id): ?>
                                            <hr>

                                            

                                            <div class="btn-group">





                                            <a class="btn btn-success text-white btn-connect text-capitalize font-weight-bold" data-id="<?php echo e(Crypt::encrypt($user->id)); ?>">

                                                <?php if(checkUserFollowing(Auth::id(), $user->id) > 0): ?>

                                                    Unfollow

                                                <?php else: ?>

                                                    Follow

                                                <?php endif; ?>

                                            </a>



                                            <a data-toggle="modal" data-target="#exampleModal" href="javascript:void()" data-id="<?php echo e($user->id); ?>"  class="btn btn-dark">Message</a>



                                            </div>
                                            <hr>
                                            <?php endif; ?>





                                            

                                            <p><?php echo e($user->userSocialProfile->about ?? ''); ?></p>





                                        </div>

                                    </div>



                                    <div class="card">

                                        <div class="card-body pt-1">

                                            <h6>Sponsored</h6>

                                            <div class="row">

                                                    <?php $__currentLoopData = adsSponsorship(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                            <div class="col-md-12 pb-2">

                                                                <img src="<?php echo e(asset($item->image)); ?>" class="media-popup w-100"  data-src="<?php echo e(asset($item->image)); ?>">

                                                            </div>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </div>

                                        </div>

                                    </div>



                                </div>







                        </div>





            </div>



        </div>

    </div>

</div>

    </section>

</div>

























<!-- modal for first msg!-->

<!-- Button trigger modal -->

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <form method="post" action="<?php echo e(route('social.connection.send.message',$user->id)); ?>" id="first_msg_form">

            <?php echo csrf_field(); ?>

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Send Message </h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    <input type="hidden" value="<?php echo e($user->id); ?>" name="receiver_id">

                    <input type="hidden" value="0" name="con_id">

                    <textarea name="message" rows="5" class="form-control border-0 border-white" placeholder="Write your message here... "></textarea>

                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Send Now</button>

                </div>

            </div>

        </form>

    </div>

</div>



<?php if(Auth::user()->role == 'advocate' || Auth::user()->role == 'homeopath'): ?>

<a data-toggle="modal" data-target="#modalReportUser" class="report-float" title="Report <?php echo e($user->name ?? ''); ?>">

    <i class="far fa-flag"></i>

</a>

<div class="modal fade" id="modalReportUser" tabindex="-1" role="dialog">

    <div class="modal-dialog" role="document">

        <div class="modal-content rounded-0">

            <div class="modal-header rounded-0" style="background:#546E7A;">

                <h5 class="modal-title text-white">Report <?php echo e($user->name ?? ''); ?></h5>

            </div>

            <form method="post" action="<?php echo e(route('social.report.user')); ?>">

                <?php echo csrf_field(); ?>

                <input type="hidden" name="user_id" value="<?php echo e(Crypt::encrypt($user->id)); ?>">

                <div class="modal-body">

                    <textarea name="reason" placeholder="You are reporting! We want to here from you about report, but please don’t send irrelevent information. Right the report here." required=""></textarea>

                </div>

                <div class="py-1 px-1" style="background-color: #FAFAFA;">



                    <select class="form-control" required="" name="type">

                        <option value="Bad Content">Bad Content</option>

                        <option value="Hateful or abusive">Hateful or abusive</option>

                        <option value="Harassment or bullying">Harassment or bullying</option>

                        <option value="Harmful or dangerous acts">Harmful or dangerous acts</option>

                        <option value="Child abuse">Child abuse</option>

                        <option value="Promotes terrorism">Promotes terrorism</option>

                        <option value="Spam or misleading">Spam or misleading</option>

                        <option value="Infringes my rights">Infringes my rights</option>

                        <option value="Captions issue">Captions issue</option>

                        <option value="misleading">Misleading</option>

                    </select>

                    <small>Users are reviewed by CHWG staff 24 hours a day, 7 days a week to determine whether they violate Community Guidelines.

                    Accounts are penalized for Community Guidelines violations, and serious or repeated violations can lead to account termination.</small>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn font-weight-bold" data-dismiss="modal">CANCEL</button>

                    <button type="submit" class="btn text-primary font-weight-bold">REPORT</button>

                </div>

            </form>

        </div>

    </div>

</div>

<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>







<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.social_network', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/vendor/social-network/connection/user_profile.blade.php ENDPATH**/ ?>