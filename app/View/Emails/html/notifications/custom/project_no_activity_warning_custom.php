<?= __('Hello!'); ?>
<br>
<br>
<?= __('We have noticed the project %s has not been updated in the last %s days, this means it has not been edited and comments/attachments have not been included.', $itemTitle, abs($notificationInstance['reminderDays'])); ?>
<br>
<br>
<?= __('Regards'); ?>
