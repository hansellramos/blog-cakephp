<h1>Blog Posts</h1>
<table>
    <tr>
        <td>Id</td>
        <td>Name</td>
        <td>Created</td>
        <td></td>
    </tr>
    <?php foreach($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td><?php echo $this->Html->link($post['Post']['title'],array('controller'=>'posts','action'=>'view',$post['Post']['id'])); ?></td>
        <td><?php echo $post['Post']['created']; ?></td>
        <td>
            <?php echo $this->Html->link('Edit',array('action'=>'edit',$post['Post']['id'])); ?>
            <?php echo $this->Form->postLink('Delete',array('action'=>'delete',$post['Post']['id']),array('confirm'=>'Are u sure?')); ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php echo $this->Html->link('Add Post',array('action'=>'add')); ?>
