<div class="sidebar__account">
    <div class="sidebar__account-group">
        <h2 class="title__global-3">
            Tài khoản
        </h2>
        <ul class="sidebar__account-list">
            <li class="<?= $post->post_name === PAGE_ACCOUNT_SLUG ? 'active' : '' ?>">
                <a href="<?= get_account_page_url() ?>">Thông tin tài khoản</a>
            </li>
            <li class="<?= $post->post_name === PAGE_CHANGE_PASS_SLUG ? 'active' : '' ?>">
                <a href="<?= get_change_password_page_url() ?>">Đổi mật khẩu</a>
            </li>
            <li>
                <a href="#">Địa chỉ nhận hàng</a>
            </li>
            <li>
                <a href="#">Lịch sử mua hàng</a>
            </li>
        </ul>
    </div>
</div>