<aside class="col-12 col-md-3 col-lg-2 p-0 bg-dark">
    <nav class="navbar navbar-expand navbar-dark bg-dark flex-md-column flex-row align-items-start py-2">
        <div class="collapse navbar-collapse p-0">
            <ul class="flex-md-column flex-row navbar-nav w-100 p-0">

                <li class="nav-item">
                    <a class="nav-link pl-0 text-nowrap" href="/admin/panel">
                        <i class="fa fa-bullseye fa-fw"></i>
                        <span class="font-weight-bold">پنل مدیریت</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link pl-0" href="/admin/panel/article">
                        <i class="fa fa-book fa-fw"></i>
                        <span class="d-none d-md-inline">مدیریت مقاله</span>
                    </a>
                </li>
                <?php
                use App\Comment;
                $successful = Comment::where('approved' , 1)->count();
                $unsuccessful = Comment::where('approved' , 0)->count();
                ?>
                <li class="nav-item">
                    <a class="nav-link pl-0" href="/admin/comments">
                        <i class="fas fa-comments"></i>
                        <span class="d-none d-md-inline"> همه نظرات </span> <span class="suc-number">{{ $successful }}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link pl-0" href="/admin/comments/unsuccessful">
                        <i class="fas fa-comments"></i>
                        <span class="d-none d-md-inline">نظرات تایید نشده  </span><span class="suc-number">{{ $unsuccessful }}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link pl-0" href="/admin/profile/1/edit">
                        <i class="fas fa-users"></i>
                        <span class="d-none d-md-inline">اطلاعات پروفایل</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link pl-0" href="/admin/change/password">
                        <i class="fas fa-link"></i>
                        <span class="d-none d-md-inline">تغییر رمز عبور</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-0" href="/logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="d-none d-md-inline">خروج از پنل مدیریت</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</aside>

