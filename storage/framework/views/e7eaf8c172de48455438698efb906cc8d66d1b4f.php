<?php $__env->startSection('title','FAQ'); ?>
<?php $__env->startSection('heading','FAQ'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">

    <div class="col-sm-12">
        <div class="card">
            <div class="card">
                <div class="card-header ml-auto">
                    <a href="<?php echo e(route('admin.faq.create')); ?>" class="btn btn-primary">+ Add new Question</a>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table datatable p-0 table-hover-animation">
                                <thead>
                                    <tr>
                                        <th>Question</th>
                                        <th>Answer</th>

                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr>
                                        <td><?php echo e(Str::limit($item->question??'',50)); ?></td>
                                        <td>
                                            <!-- <?php echo html_entity_decode($item->answer); ?> -->
                                            <span class="q_answer d-none"><?php echo html_entity_decode($item->answer); ?></span>
                                            <a href="#" class="btn btn-warning faq_answer" data-answer="">View Answer</a>
                                        </td>
                                        <td class="btn-group">
                                            <a href="<?php echo e(route('admin.faq.edit',$item->id)); ?>" class="btn btn-primary">Edit</a>
                                            <a href="<?php echo e(route('admin.faq.delete',$item->id)); ?>" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- modal -->



<div class="modal fade view_answer_modal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">FAQ Answer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <textarea class="form-control faq_ans_p " rows="12"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script type="text/javascript">
    $(document).on('click','.faq_answer',function(){
        // var ans=$(this).data('answer');
        var ans=$(this).closest('tr').find('.q_answer').text();
      
        $('.faq_ans_p').text(ans);
        $('.view_answer_modal').modal('show');
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/faq/list.blade.php ENDPATH**/ ?>