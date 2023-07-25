@extends('privacy.layout.privacy')

@section('content')
<style>
      #sidebar ul li:hover{
        background: rgba(224, 121, 63, 0.15);
 
      }
      #sidebar ul li span:hover{
        color: orange;
      }
      @media (max-width:1990px){
        .content-wrapper {
  background: #f2edf3;
  padding: 2.75rem 2.25rem;
  width: 100%;
  -webkit-box-flex: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
}
        .nav-profile-text p{
          padding-top: 15px; 
            font-size: 26px;
            font-style: normal;
            font-weight: 700;
            line-height: 28.4px;
            background: linear-gradient(
              90deg,
              #fbc250 0%,
              #dea143 24.48%,
              #f5ae5d 50%,
              #de8c49 77.08%,
              #e0793f 100%
            );
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
      }
      @media (max-width:1290px){
      .title-hi h2{
        display: none;
      }
      }
      @media (max-width:390px){
      .nav-profile-text p{
        font-size: 14px;
      }
      .title-HSD__icons h1{
        font-size: 18px;
      }
      .title-HSD__icons img{
        width: 17px;
        height: 17px;
      }
      .column-right__title h1{
        font-size: 18px;
      }
      .content-wrapper {
  background: #f2edf3;
  padding: 1rem 1rem;
}
/* .sidebar{
    width:0px;
} */
      }
    </style>

    <!-- Start Sidebar -->
    <div class="sidebar" style="overflow-y: auto; position: sticky; top: 0;">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
<<<<<<< HEAD
        <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="../../index.html">
                <span class="menu-title">Điều khoản sử dụng</span>
              </a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                data-bs-toggle="collapse"
                href="#ui-basic"
                aria-expanded="false"
                aria-controls="ui-basic"
              >
                <span class="menu-title">Chính sách bảo mật</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../pages/icons/mdi.html">
                <span class="menu-title">Quy chế hoạt động</span>
              
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../pages/forms/basic_elements.html">
                <span class="menu-title">Quy định về đặt đơn hàng</span>
           
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../pages/charts/chartjs.html">
                <span class="menu-title">Điều khoản và điều kiện giao dịch</span>
               
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../pages/tables/basic-table.html">
                <span class="menu-title">Chính sách thanh toán</span>
              
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../pages/tables/basic-table.html">
                <span class="menu-title">Chính sách trả hàng & hoàn tiền</span>
                
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../pages/tables/basic-table.html">
                <span class="menu-title">Quy trình giải quyết tranh chấp...</span>
             
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../pages/tables/basic-table.html">
                <span class="menu-title">Quy trình, thủ tục phối hợp chủ thể...</span>
           
              </a>
            </li>
          </ul>
=======
            <ul class="nav">
                @foreach($listPrivacy as $key => $privacy)
                    <li class="nav-item">
                        <a class="nav-link sidebar-link" href="{{ route('privacy.detail', ['slug' => $privacy->slug]) }}">
                            <span class="menu-title">{{ $privacy->title }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
>>>>>>> a3248df6a29f66dfaa72f2dc82a09118d1f7dd7c
        </nav>
    </div>
    <!-- End Sidebar -->

    <!-- Start main-panel -->
    <div class="main-panel">
<<<<<<< HEAD
          <div class="content-wrapper">
            <div class="column-right__text">
              <div class="title-HSD">
                <div class="title-HSD__icons">
                  <a href="#" style="display: flex; color: #303030;
                  font-family: Lato;
                  font-size: 28px;
                  font-style: normal;
                  font-weight: 700;
                  line-height: normal;
                  text-decoration: none;"><img
                      src="../../assets/images/down1.png"
                      width="30px"
                      height="30px"
                  />
                  <h1>Các Chính sách & Điều khoản</h1>
                </a>
=======
        <!-- Start Content -->
        <div class="content-wrapper" style="overflow-y: auto; overflow-x: hidden; padding: 10px; ">
            <div class="content-wrapper" style="padding: 1rem 1rem; font-family: 'Lato', sans-serif;">
                <div class="column-right__text">

                    <div class="title-HSD" style="display:flex;">
                        <div class="title-HSD__icons">
                            <a href="{{ route('privacy.index') }}" style="display:flex;">
                                <img src="{{ asset('icon/backButton.svg') }}" width="30px" height="30px"/>
                                <h1 style="text-decoration: none; color: #303030; font-family: Lato; font-size: 28px; font-style: normal; font-weight: 700; line-height: normal;">
                                    Chính sách & Điều khoản
                                </h1>
                            </a>
                        </div>
                    </div>

                    <div class="column-right__title">
                        <h1>
                            {{ $privacy->title }}
                        </h1>
                    </div>

>>>>>>> a3248df6a29f66dfaa72f2dc82a09118d1f7dd7c
                </div>
              </div>
              <div class="column-right__title">
                <h1>
                  Quy trình, thủ tục phối hợp chủ thể quyền sở hữu trí tuệ
                </h1>
              </div>
            </div>
            <p>
              1. GIỚI THIỆU<br />
              1.1. Chào mừng bạn đến với nền tảng Shopee.vn (bao gồm website và
              ứng dụng di động Shopee) được vận hành bởi Công ty TNHH Shopee và
              các công ty liên kết (gọi riêng và gọi chung là, "Shopee", "chúng
              tôi", hay "của chúng tôi"). Shopee nghiêm túc thực hiện trách
              nhiệm của mình liên quan đến bảo mật thông tin theo các quy định
              về bảo vệ bí mật thông tin cá nhân của pháp luật Việt Nam (“Luật
              riêng tư”) và cam kết tôn trọng quyền riêng tư và sự quan tâm của
              tất cả người dùng đối với website và ứng dụng di động của chúng
              tôi (“Nền tảng”) (chúng tôi gọi chung Các Nền tảng và các dịch vụ
              chúng tôi cung cấp như được mô tả trong Nền tảng của chúng tôi là
              "các Dịch Vụ"). Người dùng có nghĩa là người đăng ký tài khoản với
              chúng tôi để sử dụng các Dịch Vụ, bao gồm cả người mua và người
              bán (gọi chung và gọi riêng là “Các Người Dùng”, “bạn” hoặc “của
              bạn”). Chúng tôi nhận biết tầm quan trọng của dữ liệu cá nhân mà
              bạn đã tin tưởng giao cho chúng tôi và tin rằng chúng tôi có trách
              nhiệm quản lý, bảo vệ và xử lý dữ liệu cá nhân của bạn một cách
              thích hợp. Chính sách bảo mật này ("Chính sách bảo mật" hay "Chính
              sách") được thiết kế để giúp bạn hiểu được cách thức chúng tôi thu
              thập, sử dụng, tiết lộ và/hoặc xử lý dữ liệu cá nhân mà bạn đã
              cung cấp cho chúng tôi và/hoặc lưu giữ về bạn, cho dù là hiện nay
              hoặc trong tương lai, cũng như để giúp bạn đưa ra quyết định sáng
              suốt trước khi cung cấp cho chúng tôi bất kỳ dữ liệu cá nhân nào
              của bạn. <br /><br />1.2. "Dữ Liệu Cá Nhân" hay "dữ liệu cá nhân"
              có nghĩa là dữ liệu, dù đúng hay không, về một cá nhân mà thông
              qua đó có thể được xác định được danh tính, hoặc từ dữ liệu đó và
              thông tin khác mà một tổ chức có hoặc có khả năng tiếp cận. Các ví
              dụ thường gặp về dữ liệu cá nhân có thể gồm có tên, số chứng minh
              nhân dân và thông tin liên hệ. <br /><br />1.3. Bằng việc sử dụng
              Các Dịch Vụ, đăng ký một tài khoản với chúng tôi hoặc truy cập Nền
              tảng, bạn xác nhận và đồng ý rằng bạn chấp nhận các phương pháp,
              yêu cầu, và/hoặc chính sách được mô tả trong Chính sách bảo mật
              này, và theo đây bạn xác nhận bạn đã biết rõ và đồng ý toàn bộ cho
              phép chúng tôi thu thập, sử dụng, tiết lộ và/hoặc xử lý dữ liệu cá
              nhân của bạn như mô tả trong đây. NẾU BẠN KHÔNG ĐỒNG Ý CHO PHÉP XỬ
              LÝ DỮ LIỆU CÁ NHÂN CỦA BẠN NHƯ MÔ TẢ TRONG CHÍNH SÁCH NÀY, VUI
              LÒNG KHÔNG SỬ DỤNG CÁC DỊCH VỤ CỦA CHÚNG TÔI HAY TRUY CẬP NỀN TẢNG
              HOẶC TRANG WEB CỦA CHÚNG TÔI. Nếu chúng tôi thay đổi Chính sách
              bảo mật của mình, chúng tôi sẽ thông báo cho bạn bao gồm cả thông
              qua việc đăng tải những thay đổi đó hoặc Chính sách bảo mật sửa
              đổi trên Nền tảng của chúng tôi. Trong phạm vi pháp luật cho phép,
              việc tiếp tục sử dụng các Dịch Vụ hoặc Nền Tảng, bao gồm giao dịch
              của bạn, được xem là bạn đã công nhận và đồng ý với các thay đổi
              trong Chính Sách Bảo Mật này. <br /><br />1.4. Chính sách này áp
              dụng cùng với các thông báo, điều khoản hợp đồng, điều khoản chấp
              thuận khác áp dụng liên quan đến việc chúng tôi thu thập, lưu trữ,
              sử dụng, tiết lộ và/hoặc xử lý dữ liệu cá nhân của bạn và không
              nhằm ghi đè những thông báo hoặc các điều khoản đó trừ khi chúng
              tôi có tuyên bố ràng khác. <br /><br />1.5. Chính sách này được áp
              dụng cho cả Người bán và Người mua đang sử dụng Dịch vụ trừ khi có
              tuyên bố rõ ràng ngược lại. <br /><br />2. KHI NÀO SHOPEE SẼ THU
              THẬP DỮ LIỆU CÁ NHÂN? <br />2.1. Chúng tôi sẽ/có thể thu thập dữ
              liệu cá nhân về bạn: <br />1.khi bạn đăng ký và/hoặc sử dụng Các
              Dịch Vụ hoặc Nền tảng của chúng tôi, hoặc mở một tài khoản với
              chúng tôi; <br />2.khi bạn gửi bất kỳ biểu mẫu nào, bao gồm đơn
              đăng ký hoặc các mẫu đơn khác liên quan đến bất kỳ sản phẩm và
              dịch vụ nào của chúng tôi, bằng hình thức trực tuyến hay dưới hình
              thức khác;<br />
              3.khi bạn ký kết bất kỳ thỏa thuận nào hoặc cung cấp các tài liệu
              hoặc thông tin khác liên quan đến tương tác giữa bạn với chúng
              tôi, hoặc khi bạn sử dụng các sản phẩm và dịch vụ của chúng tôi;
              <br />4.khi bạn tương tác với chúng tôi, chẳng hạn như thông qua
              các cuộc gọi điện thoại (có thể được ghi âm lại), thư từ, fax, gặp
              gỡ trực tiếp, các nền ứng dụng truyền thông xã hội và email;
              <br />5.khi bạn sử dụng các dịch vụ điện tử của chúng tôi, hoặc
              tương tác với chúng tôi qua Nền tảng hoặc Trang Web hoặc Các Dịch
              Vụ của chúng tôi. Trường hợp này bao gồm thông qua tập tin cookie
              mà chúng tôi có thể triển khai khi bạn tương tác với các Nền tảng
              hoặc Trang Web của chúng tôi; <br />7.khi bạn cấp quyền trên thiết
              bị của bạn để chia sẻ thông tin với ứng dụng hoặc Nền tảng của
              chúng tôi Khi bạn liên kết tài khoản Shopee với tài khoản mạng xã
              hội của bạn hoặc các tài khoản bên ngoài khác hoặc sử dụng các
              tính năng mạng xã hội khác, phù hợp với các chính sách của nhà
              cung cấp; <br />8.khi bạn thực hiện các giao dịch thông qua Dịch
              vụ của chúng tôi chẳng hạn như mỗi khi bạn đặt mua hàng hoặc chấp
              nhận đơn đặt hàng của Người mua; <br />9.khi bạn cung cấp ý kiến
              phản hồi hoặc gửi khiếu nại cho chúng tôi; <br />10.khi bạn đăng
              ký tham gia một cuộc thi; <br />11.khi bạn gửi dữ liệu cá nhân của
              bạn cho chúng tôi vì bất kỳ lý do gì; và/hoặc <br />12.khi bạn
              thực hiện các hoạt động khác trên Nền tảng của chúng tôi.
              <br /><br />Các trường hợp trên không nhằm mục đích liệt kê đầy đủ
              các trường hợp và chỉ đưa ra một số trường hợp phổ biến về thời
              điểm dữ liệu cá nhân của bạn có thể bị thu thập. <br />2.2. Chúng
              tôi có thể thu thập thông tin của bạn từ bạn, các công ty liên
              kết, các bên thứ ba và từ các nguồn khác, bao gồm nhưng không giới
              hạn ở đối tác kinh doanh (ví dụ như đơn vị cung ứng dịch vụ vận
              chuyển, thanh toán), cơ quan đánh giá tín dụng, các đơn vị, đối
              tác cung cấp dịch vụ marketing, giới thiệu, các chương trình khách
              hàng thân thiết, những người dùng khác sử dụng Các Dịch Vụ của
              chúng tôi hoặc các nguồn dữ liệu công khai có sẵn hay các nguồn dữ
              liệu của nhà nước. <br /><br />2.3. Trong một số trường hợp, bạn
              có thể cung cấp dữ liệu cá nhân của các cá nhân khác cho chúng tôi
              (ví dụ như thành viên gia đình, bạn bè hoặc những người trong danh
              sách liên hệ của bạn). Nếu bạn cung cấp cho chúng tôi dữ liệu cá
              nhân của họ, bạn tuyên bố và đảm bảo rằng bạn đã nhận được sự đồng
              ý của họ để xử lý dữ liệu cá nhân của họ theo Chính sách này.
              <br /><br />3. SHOPEE SẼ THU THẬP NHỮNG DỮ LIỆU GÌ? <br />3.1. Trừ
              trường hợp được quy định khác đi trong Chính sách này, dữ liệu cá
              nhân mà Shopee có thể thu thập bao gồm dữ liệu cá nhân cơ bản và
              dữ liệu cá nhân nhạy cảm (theo quy định của Luật riêng tư) như
              được liệt kê dưới đây: <br />1.họ tên; <br />.2địa chỉ email;
              <br />.3ngày sinh; <br />.4địa chỉ thanh toán và/hoặc giao nhận
              hàng hóa; <br />5.tài khoản ngân hàng và thông tin thanh toán;<br />
              6.số điện thoại; <br />.7giới tính; <br />.8thông tin được gửi bởi
              hoặc liên quan đến (các) thiết bị được sử dụng để truy cập vào Các
              Dịch vụ hoặc Nền tảng của chúng tôi; <br />9.thông tin về mạng của
              bạn, bao gồm danh sách liên hệ của bạn khi đồng ý chia sẻ trên
              thiết bị của bạn, và những người và tài khoản mà bạn có tương tác;
              <br />10.hình ảnh hoặc âm thanh hoặc video; <br />11.thông tin về
              nhân thân được cấp bởi chính phủ hoặc các thông tin khác phục vụ
              cho các mục đích đánh giá pháp lý, nhận biết khách hàng, xác minh
              thông tin và/hoặc phòng chống gian lận của chúng tôi; <br />12.dữ
              liệu truyền thông hoặc liên lạc, ví dụ như các tùy chọn nhận thông
              tin quảng cáo từ chúng tôi hoặc các bên thứ ba của bạn, tùy chọn
              phương tiện liên lạc và lịch sử thông tin liên lạc với chúng tôi,
              các nhà cung cấp dịch vụ của chúng tôi, và các bên thứ ba khác;
              <br />13.thông tin sử dụng và giao dịch, bao gồm chi tiết về lịch
              sử tìm kiếm, giao dịch, quảng cáo và nội dung hiển thị mà tương
              tác với Nền Tảng, cũng như các sản phẩm và dịch vụ có liên quan
              của bạn; <br />14.dữ liệu về địa điểm; <br />15.bất kỳ thông tin
              nào khác về người dùng khi người dùng đăng nhập để sử dụng Các
              Dịch Vụ hoặc Nền tảng của chúng tôi, và khi người dùng sử dụng Các
              Dịch Vụ hoặc Nền tảng, cũng như thông tin về việc người dùng sử
              dụng Các Dịch Vụ hoặc Nền tảng của chúng tôi như thế nào; và
              <br />16.dữ liệu tổng hợp về nội dung người dùng sử dụng.
              <br /><br />3.2. Bạn đồng ý không cung cấp cho chúng tôi bất cứ
              thông tin nào không chính xác hoặc gây hiểu nhầm và bạn đồng ý sẽ
              thông báo cho chúng tôi về bất cứ thông tin nào không chính xác
              hoặc khi có sự thay đổi thông tin. Chúng tôi bảo lưu quyền theo
              quyết định riêng của chúng tôi được yêu cầu các tài liệu cần thiết
              khác để xác minh bất cứ thông tin nào được bạn cung cấp.
              <br /><br />3.3. Nếu bạn đăng nhập để trở thành Người sử dụng các
              Nền tảng của chúng tôi sử dụng tài khoản mạng xã hội của Bạn (“Tài
              khoản Mạng Xã hội”), liên kết tài khoản của bạn với Tài khoản Mạng
              Xã hội của bạn hoặc sử dụng bất cứ tính năng mạng xã hội Shopee
              nào, chúng tôi có quyền truy cập thông tin về bạn mà bạn đã cung
              cấp một cách tự nguyên cho nhà cung cấp dịch vụ Tài khoản Mạng Xã
              hội của Bạn tuân theo các chính sách của các nhà cung cấp dịch vụ
              này, và chúng tôi sẽ quản lý, xử lý và sử dụng các dữ liệu cá nhân
              này của bạn theo các quy định của Chính sách này tại mọi thời
              điểm. <br />3.4. Nếu bạn không muốn chúng tôi thu thập thông
              tin/dữ liệu cá nhân nói trên, bạn có thể chọn không tham gia vào
              bất kỳ lúc nào bằng cách thông báo bằng văn bản đến Chuyên viên
              Bảo Vệ Dữ Liệu Cá Nhân của chúng tôi. Có thể tìm thấy thêm thông
              tin về nội dung trong mục "Bạn có thể rút lại sự đồng ý, yêu cầu
              xóa, hạn chế xử lý, phản đối xử lý, yêu cầu cung cấp dữ liệu cá
              nhân, truy cập hoặc điều chỉnh thông tin bạn đã cung cấp cho chúng
              tôi bằng cách nào?" dưới đây. Tuy nhiên, lưu ý rằng việc từ chối
              hoặc hủy bỏ cho phép chúng tôi thu thập, sử dụng hoặc xử lý dữ
              liệu cá nhân của bạn có thể ảnh hưởng đến việc bạn sử dụng Các
              Dịch Vụ và Nền tảng. Ví dụ như dịch vụ xác định vị trí sẽ không
              hoạt động nếu bạn không cho phép ứng dụng truy cập vị trí của bạn.
              <br /><br />4. THU THẬP CÁC DỮ LIỆU KHÁC <br />4.1 Như với hầu hết
              các trang web và các ứng dụng di động khác, thiết bị của bạn gửi
              thông tin có thể gồm có dữ liệu về bạn, được một máy chủ web ghi
              lại khi bạn sử dụng Nền tảng của chúng tôi. Thông tin này thông
              thường bao gồm nhưng không giới hạn địa chỉ IP, hệ điều hành của
              máy tính/thiết bị di động, loại trình duyệt, loại thiết bị di
              động, các đặc điểm của thiết bị di động, mã định danh thiết bị
              thống nhất (UDID) hoặc mã định danh thiết bị di động (MEID) của
              thiết bị di động của bạn, địa chỉ tham chiếu của Trang Web (nếu
              có), các trang mà bạn đã truy cập đến trên trang web hoặc ứng dụng
              di động của chúng tôi và thời gian truy cập và đôi khi là "cookie"
              (có thể vô hiệu hóa bằng cách sử dụng tùy chọn trình duyệt của
              bạn) để giúp trang web ghi nhớ lần truy cập cuối cùng của bạn. Nếu
              bạn đăng nhập, thông tin này được liên kết với tài khoản cá nhân
              của bạn. Thông tin này cũng được đưa vào các số liệu thống kê ẩn
              danh để giúp chúng tôi hiểu được khách truy cập sử dụng Trang Web
              của chúng tôi như thế nào. <br />4.2 Các ứng dụng di động của
              chúng tôi có thể thu thập thông tin chính xác về địa chỉ của thiết
              bị di động của bạn sử dụng các công nghệ như GPS, Wi-Fi,…. Chúng
              tôi thu thập, sử dụng, công bố và/hoặc xử lý các thông tin này cho
              một hoặc nhiều mục đích bao gồm nhưng không giới hạn các dịch vụ
              được cung cấp dựa trên vị trí mà bạn yêu cầu hoặc chuyển các nội
              dung có liên quan đến bạn dựa trên vị trí của bạn hoặc cho phép
              bạn chia sẻ vị trí của bạn cho các Người sử dụng khác như là một
              phần của các Dịch vụ được cung cấp bởi các ứng dụng di động của
              chúng tôi. Đối với phần lớn các thiết bị di động, bạn có thể rút
              lại sự cho phép để chúng tôi được thu thập các thông tin này dựa
              trên vị trí của bạn thông qua các cài đặt trên thiết bị. Nếu bạn
              có câu hỏi nào về cách thức vô hiệu hóa các dịch vụ vị trí trên
              thiết bị di động của bạn, vui lòng liên hệ với các nhà cung cấp
              dịch vụ thiết bị di động hoặc nhà sản xuất thiết bị của bạn.
              <br />4.3. Như khi bạn xem các trang trên trang web hoặc ứng dụng
              di động của chúng tôi, khi bạn xem các nội dung và quảng cáo và
              truy cập vào phần mềm khác trên Nền tảng của chúng tôi hoặc thông
              qua Dịch vụ, các thông tin có thể được gửi đến cho chúng tôi (bao
              gồm nhưng không giới hạn, địa chỉ IP, hệ điều hành, v.v..); nhưng,
              thay vì các số lượt xem trang, thiết bị của bạn gửi đến chúng tôi
              các thông tin về nội dung, quảng cáo được xem và/hoặc phần mềm
              được cài đặt bởi các Dịch vụ và Nền tảng và thời điểm.
              <br /><br />5. COOKIES <br />5.1. Đôi khi chúng tôi hoặc các nhà
              cung cấp dịch vụ được cho phép và các đối tác quảng cáo của chúng
              tôi có thể sử dụng "cookie" hoặc các tính năng khác để cho phép
              chúng tôi hoặc các bên thứ ba thu thập hoặc chia sẻ thông tin liên
              quan đến việc sử dụng của bạn đối với Dịch vụ hoặc Nền tảng của
              chúng tôi. Các tính năng này sẽ giúp chúng tôi cải thiện Nền tảng
              và Các Dịch Vụ chúng tôi cung cấp, giúp chúng tôi đề xuất các dịch
              vụ và tính năng mới, và/hoặc cho phép chúng tôi và các đối tác
              quảng cáo của chúng tôi cung cấp các nội dung có liên quan hơn đến
              bạn. "Cookie" là các mã danh định được lưu trữ trên máy tính hoặc
              thiết bị di động của bạn lưu trữ các dữ liệu về máy tính hoặc
              thiết bị, bằng cách nào và khi nào Các Dịch Vụ hoặc Nền tảng được
              sử dụng hay truy cập, bởi bao nhiêu người và để theo dõi những
              hoạt động trong Các Nền tảng của chúng tôi. Chúng tôi có thể liên
              kết thông tin cookie với dữ liệu cá nhân. Cookie cũng liên kết với
              thông tin về những nội dung bạn đã chọn để mua sắm và các trang
              web mà bạn đã xem. Thông tin này được sử dụng để theo dõi giỏ
              hàng, để chuyển tải nội dung phù hợp với sở thích của bạn, để cho
              phép các đối tác cung cấp dịch vụ quảng cáo cung cấp dịch vụ quảng
              cáo trên các trang thông qua mạng Internet và để thực hiện phân
              tích dữ liệu và hoặc theo dõi việc sử dụng Dịch vụ
              <br /><br />5.2. Bạn có thể từ chối sử dụng cookie bằng cách chọn
              các thiết lập thích hợp trên trình duyệt hoặc thiết bị của bạn.
              Tuy nhiên, vui lòng lưu ý rằng nếu bạn thực hiện thao tác này bạn
              có thể không sử dụng được các chức năng đầy đủ của Nền tảng hoặc
              Các Dịch Vụ của chúng tôi.
            </p>
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span
                class="text-muted d-block text-center text-sm-start d-sm-inline-block"
                >Copyright © bootstrapdash.com 2021</span
              >
              <span class="float-none float-sm-end mt-1 mt-sm-0 text-end">
                Free
                <a
                  href="https://www.bootstrapdash.com/bootstrap-admin-template/"
                  target="_blank"
                  >Bootstrap admin template</a
                >
                from Bootstrapdash.com</span
              >
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
        <!-- End Content -->

        <!-- Start Footer -->
        <!-- <footer class="footer" style="border-top: none; width: 100%; margin-top: 0px; background: #F3F3ED">
            @include('layout.include.footer')
        </footer> -->
        <!-- End Footer -->
    </div>
    <!-- End main-panel -->

    <!-- Trong phần đầu của layout -->
    <script>
        // Xử lý khi nhấp vào sidebar
        document.addEventListener('click', function(e) {
            var target = e.target;

            // Kiểm tra nếu nhấp vào một sidebar link
            if (target && target.matches('.sidebar-link')) {
                e.preventDefault();

                var slug = target.dataset.slug;
                var url = '{{ route("privacy.detail", ":slug") }}'.replace(':slug', slug);

                // Thay đổi URL và load lại trang
                window.history.pushState({}, '', url);
                window.location.reload();
            }
        });
    </script>

@endsection
