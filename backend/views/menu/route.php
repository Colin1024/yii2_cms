<?php
use yii\helpers\Url;
?>
<div class="x-body">
    <xblock>
        <button class="layui-btn layui-btn-danger" onclick="batch_del('<?= Url::to([$this->context->id . '/route-batch-del']) ?>')"><i class="layui-icon"></i>批量删除</button>
        <button class="layui-btn" onclick="x_admin_show('添加','<?=  Url::to([$this->context->id . '/route-create', 'submenu_id' => $id]) ?>')"><i class="layui-icon"></i>添加</button>
        <span class="x-right" style="line-height:40px">共有数据：<span class="count_num"><?= $count ?></span> 条 </span>
    </xblock>
    <table class="layui-table">
        <thead>
        <tr>
            <th>
                <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>ID</th>
            <th>路由名</th>
            <th>路由</th>
            <th>状态</th>
            <th>创建时间</th>
            <th>操作</th>
        </thead>
        <tbody>
        <?php foreach ($models as $list): ?>
            <tr>
                <td>
                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='<?= $list['id']?>'><i class="layui-icon">&#xe605;</i></div>
                </td>
                <td><?= $list['id'] ?></td>
                <td><?= $list['route_name'] ?></td>
                <td><?= $list['route'] ?></td>
                <td><?= $list['status'] == 1 ? '启用' : '禁用' ?></td>
                <td><?= date('Y-m-d H:i:s', $list['create_time']) ?></td>
                <td class="td-manage">
                    <a title="编辑"  onclick="x_admin_show('编辑','<?= Url::to([$this->context->id . '/route-update', 'id' => $list['id']])?>')" href="javascript:;">
                        <i class="layui-icon">&#xe642;</i>
                    </a>
                    <a title="删除" onclick="del(this,'<?= $list['id'] ?>', '<?= Url::to([$this->context->id . '/route-del']) ?>')" href="javascript:;">
                        <i class="layui-icon">&#xe640;</i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php if (empty($models)): ?>
        <p class="text-empty">-- 暂无数据 --</p>
    <?php endif; ?>
</div>