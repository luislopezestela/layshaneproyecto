<div class="page-margin" itemscope itemtype="http://schema.org/BlogPosting">
	<div class="wow_read_blog_hdr_img">
		<img src="<?php echo($wo['article']['thumbnail']); ?>" class="wow_main_float_head_img">
		<div class="wow_read_blog_hdr_img_share">
			<ul class="list-unstyled">
				<li>
					<a href="javascript:void(0)" onclick="Wo_OpenWindow('<?php echo($wo['article']['url']); ?>');" title="<?php echo $wo['lang']['timeline'];?>">
						<div class="btn-share timeline">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M18,16.08C17.24,16.08 16.56,16.38 16.04,16.85L8.91,12.7C8.96,12.47 9,12.24 9,12C9,11.76 8.96,11.53 8.91,11.3L15.96,7.19C16.5,7.69 17.21,8 18,8A3,3 0 0,0 21,5A3,3 0 0,0 18,2A3,3 0 0,0 15,5C15,5.24 15.04,5.47 15.09,5.7L8.04,9.81C7.5,9.31 6.79,9 6,9A3,3 0 0,0 3,12A3,3 0 0,0 6,15C6.79,15 7.5,14.69 8.04,14.19L15.16,18.34C15.11,18.55 15.08,18.77 15.08,19C15.08,20.61 16.39,21.91 18,21.91C19.61,21.91 20.92,20.61 20.92,19A2.92,2.92 0 0,0 18,16.08Z" /></svg>
						</div>
					</a>
				</li>
				<li>
					<a href="https://www.facebook.com/sharer.php?u=<?php echo ($wo['article']['url']) ?>" target="_blank" title="<?php echo $wo['lang']['facebook'];?>">
						<div class="btn-share facebook">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13.397,20.997v-8.196h2.765l0.411-3.209h-3.176V7.548c0-0.926,0.258-1.56,1.587-1.56h1.684V3.127	C15.849,3.039,15.025,2.997,14.201,3c-2.444,0-4.122,1.492-4.122,4.231v2.355H7.332v3.209h2.753v8.202H13.397z" /></svg>
						</div>
					</a>
				</li>
				<li>
					<a href="http://twitter.com/intent/tweet?text=<?php echo $wo['article']['title'] ?>&amp;url=<?php echo ($wo['article']['url']) ?>" target="_blank" title="<?php echo $wo['lang']['twitter'];?>">
						<div class="btn-share twitter">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M22.46,6C21.69,6.35 20.86,6.58 20,6.69C20.88,6.16 21.56,5.32 21.88,4.31C21.05,4.81 20.13,5.16 19.16,5.36C18.37,4.5 17.26,4 16,4C13.65,4 11.73,5.92 11.73,8.29C11.73,8.63 11.77,8.96 11.84,9.27C8.28,9.09 5.11,7.38 3,4.79C2.63,5.42 2.42,6.16 2.42,6.94C2.42,8.43 3.17,9.75 4.33,10.5C3.62,10.5 2.96,10.3 2.38,10C2.38,10 2.38,10 2.38,10.03C2.38,12.11 3.86,13.85 5.82,14.24C5.46,14.34 5.08,14.39 4.69,14.39C4.42,14.39 4.15,14.36 3.89,14.31C4.43,16 6,17.26 7.89,17.29C6.43,18.45 4.58,19.13 2.56,19.13C2.22,19.13 1.88,19.11 1.54,19.07C3.44,20.29 5.7,21 8.12,21C16,21 20.33,14.46 20.33,8.79C20.33,8.6 20.33,8.42 20.32,8.23C21.16,7.63 21.88,6.87 22.46,6Z" /></svg>
						</div>
					</a>
				</li>
				<li>
					<a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo ($wo['article']['url']) ?>" target="_blank" title="<?php echo $wo['lang']['linkedin'];?>">
						<div class="btn-share linkedin">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21,21H17V14.25C17,13.19 15.81,12.31 14.75,12.31C13.69,12.31 13,13.19 13,14.25V21H9V9H13V11C13.66,9.93 15.36,9.24 16.5,9.24C19,9.24 21,11.28 21,13.75V21M7,21H3V9H7V21M5,3A2,2 0 0,1 7,5A2,2 0 0,1 5,7A2,2 0 0,1 3,5A2,2 0 0,1 5,3Z" /></svg>
						</div>
					</a>
				</li>
				<li>
					<a href="http://pinterest.com/pin/create/button/?url=<?php echo ($wo['article']['url']) ?>" target="_blank" title="<?php echo $wo['lang']['pinterest'];?>">
						<div class="btn-share pinterest">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M5.077,1526.543c0,0.778,0.136,1.513,0.404,2.199c0.27,0.687,0.643,1.29,1.121,1.802c0.479,0.512,1.023,0.955,1.644,1.329 c0.62,0.376,1.286,0.656,2.002,0.844c0.713,0.187,1.44,0.281,2.185,0.281c1.139,0,2.199-0.241,3.182-0.721 c0.979-0.479,1.776-1.177,2.391-2.094c0.614-0.915,0.919-1.95,0.919-3.104c0-0.692-0.068-1.369-0.207-2.031 c-0.138-0.663-0.352-1.303-0.646-1.913c-0.296-0.613-0.654-1.152-1.082-1.617c-0.426-0.464-0.947-0.835-1.568-1.114 c-0.621-0.277-1.302-0.417-2.045-0.417c-0.489,0-0.977,0.115-1.459,0.346c-0.482,0.23-0.828,0.546-1.036,0.951 c-0.073-0.281-0.173-0.687-0.306-1.218c-0.128-0.53-0.214-0.872-0.252-1.027c-0.04-0.154-0.114-0.411-0.222-0.767 c-0.108-0.356-0.202-0.614-0.281-0.769c-0.079-0.153-0.193-0.378-0.344-0.674c-0.152-0.296-0.32-0.576-0.498-0.838 c-0.181-0.262-0.405-0.575-0.672-0.935l-0.149-0.053l-0.099,0.108c-0.107,1.133-0.162,1.811-0.162,2.035 c0,0.663,0.079,1.407,0.235,2.233c0.153,0.825,0.395,1.862,0.72,3.109c0.325,1.246,0.511,1.979,0.561,2.196 c-0.229,0.467-0.345,1.077-0.345,1.827c0,0.599,0.187,1.16,0.562,1.688c0.376,0.526,0.851,0.789,1.427,0.789 c0.441,0,0.783-0.146,1.028-0.439c0.246-0.292,0.366-0.66,0.366-1.109c0-0.476-0.158-1.165-0.476-2.066 c-0.318-0.902-0.476-1.575-0.476-2.022c0-0.453,0.162-0.832,0.486-1.129c0.324-0.299,0.719-0.449,1.179-0.449 c0.396,0,0.763,0.09,1.104,0.271c0.341,0.179,0.623,0.425,0.849,0.733c0.227,0.311,0.431,0.653,0.606,1.029 c0.177,0.376,0.315,0.773,0.411,1.196c0.096,0.422,0.17,0.823,0.216,1.2c0.049,0.379,0.07,0.737,0.07,1.077 c0,1.247-0.396,2.219-1.183,2.915c-0.791,0.696-1.821,1.042-3.088,1.042c-1.441,0-2.646-0.466-3.611-1.401 c-0.966-0.932-1.452-2.117-1.452-3.554c0-0.317,0.048-0.623,0.139-0.919c0.089-0.295,0.186-0.53,0.291-0.704 c0.104-0.171,0.202-0.338,0.291-0.492c0.09-0.154,0.137-0.264,0.137-0.33c0-0.202-0.053-0.465-0.16-0.79 c-0.111-0.325-0.242-0.487-0.4-0.487c-0.015,0-0.077,0.011-0.185,0.034c-0.368,0.108-0.695,0.31-0.979,0.605 c-0.284,0.296-0.505,0.638-0.659,1.022c-0.153,0.386-0.271,0.775-0.352,1.169C5.114,1525.784,5.077,1526.168,5.077,1526.543z" transform="matrix(1 0 0 -1 0 1536)"/></svg>
						</div>
					</a>
				</li>
			</ul>
		</div>
		<div class="wow_read_blog_hdr_img_innr">
			<div class="container">
				<a class="btn btn-mat postCategory" href="<?php echo $wo['article']['category_link']; ?>" data-ajax="?link1=blog-category&id=<?php echo $wo['article']['category']; ?>"><?php echo $wo['blog_categories'][$wo['article']['category']]; ?></a>
				<h2 itemprop="headline"><?php echo $wo['article']['title']?></h2>
				<div class="read-blog-info-user">
					<div class="user-name <?php echo lui_RightToLeft('pull-right'); ?>">
						<a href="<?php echo $wo['article']['url']; ?>#respond" class="metaLink"><?php echo lui_GetBlogCommentsCount($wo['article']['id']); ?> <?php echo $wo['lang']['comments'];?></a>
						<span class="middot">·</span>
						<span class="views"><?php echo $wo['article']['view']?> <?php echo $wo['lang']['views']?></span>
					</div>
					<div class="postMeta--author-avatar">
						<a href="<?php echo $wo['article']['author']['url']?>"><img src="<?php echo $wo['article']['author']['avatar']?>" alt="User Image"></a>
					</div>
					<div class="postMeta--author-text">
						<a rel="author" href="<?php echo $wo['article']['author']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['article']['author']['username']; ?>"><?php echo $wo['article']['author']['name']; ?></a>
						<time itemprop="datePublished" content="<?php echo date("d M Y",$wo['article']['posted']); ?>"><?php echo date("d M Y",$wo['article']['posted']); ?></time>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row wow_read_blog_row">
		<div class="col-md-8 read-blog-container">
			<div class="read-blog wow_content">
				<div class="read-blog-head">
					<div class="read-blog-desc">
						<p itemprop="description"><?php echo $wo['article']['description']; ?></p>
					</div>
				</div>
				
				<!-- Additional schema meta -->
				<div itemscope="" itemprop="publisher" itemtype="http://schema.org/Organization" class="hidden">
					<meta itemprop="name" content="<?php echo $wo['config']['siteName'];?>">
					<div itemprop="logo" itemscope="" itemtype="https://schema.org/ImageObject" class="hidden">
						<meta itemprop="url" content="<?php echo $wo['config']['theme_url'];?>/img/logo.<?php echo $wo['config']['logo_extension'];?>">
						<meta itemprop="width" content="470">
						<meta itemprop="height" content="75">
					</div>
				</div>
				
				<a itemprop="mainEntityOfPage" href="<?php echo $wo['article']['url']; ?>" class="hidden"></a>
				
				<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject" class="read-blog-thumbnail hidden">
					<img src="<?php echo $wo['article']['thumbnail']; ?>" alt="<?php echo $wo['article']['title']?>">
					<meta itemprop="url" content="<?php echo $wo['article']['thumbnail']; ?>">
					<meta itemprop="width" content="700">
					<meta itemprop="height" content="250">
				</div>
				
				<div itemprop="articleBody" class="read-content">
					<?php echo nofollow(htmlspecialchars_decode($wo['article']['content'])); ?>
					<div class="clear"></div>
				</div>
              
				<div class="read-tags">
					<?php if (is_array($wo['article']['tags_array'])) {
						foreach ($wo['article']['tags_array'] as $key => $tag) {
					?>
						<a class="postTag" href="<?php echo lui_SeoLink('index.php?link1=hashtag&hash=' . $tag) ?>" rel="tag">#<?php echo $tag ?></a>
					<?php } } ?>
				</div>
            </div>
			
			<div class="page-margin wow_content">
				<div class="related-post">
					<?php echo lui_LoadPage('blog/sidebar') ?>
				</div>
			</div>
				
			<?php //if ($wo['loggedin'] == true): ?>           
			<div class="page-margin wow_content blog-com-wrapper" id="respond">
				<div class="wo_page_hdng">
					<div class="wo_page_hdng_innr">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M9,22A1,1 0 0,1 8,21V18H4A2,2 0 0,1 2,16V4C2,2.89 2.9,2 4,2H20A2,2 0 0,1 22,4V16A2,2 0 0,1 20,18H13.9L10.2,21.71C10,21.9 9.75,22 9.5,22V22H9Z"></path></svg></span> <?php echo lui_GetBlogCommentsCount($wo['article']['id']); ?>  <?php echo $wo['lang']['comments'];?>
					</div>
				</div>
                <div class="blog-com-box">
					<form class="form">
						<div class="w100 wo_blogcomm_combo">
              <?php if ($wo['loggedin'] == true): ?>
							<img class="avatar" src="<?php echo $wo['user']['avatar'];?>"/>
              <?php endif; ?>      
							<textarea id="blog-comment" name="text" class="form-control" placeholder="<?php echo $wo['lang']['write_comment'];?>"></textarea>
							<button id="add-art-comment" class="btn btn-main btn-mat add_wow_loader" type="button" data-toggle="tooltip" title="<?php echo $wo['lang']['post']; ?>">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path></svg>
							</button>
						</div>
						<div class="clear"></div>
					</form>
					<div class="clear"></div>
                </div>
                <div class="blog-comlist-container"><?php 
						foreach (lui_GetBlogComments(array('blog_id'=> $wo['article']['id'])) as $wo['comment']) {
							echo lui_LoadPage('blog/comment-list');
						}
					?></div>
                <div class="posts_load">
                   <?php if (lui_GetBlogCommentsCount($wo['article']['id']) > 5): ?>
                      <div class="load-more">
                              <button class="btn btn-default text-center pointer load-more-blog-comments">
                              <i class="fa fa-arrow-down progress-icon" data-icon="arrow-down"></i> <?php echo $wo['lang']['load_more'] ?></button>
                      </div>
                   <?php endif ?>
                </div>
			</div>
            <?php //endif;?>
		</div>
		<div class="col-md-4">
			<div class="wow_content">
				<?php echo lui_LoadPage('blog/main-sidebar') ?>
			</div>
		</div>
	</div>
	<!-- .row -->
</div>

<script>
jQuery(document).ready(function($) {
  $(".load-more-blog-comments").click(function(event) {
    var self    = $(this);
    var last_id = 0;
    if ($("div[data-blog-comment]").length > 0) {
      last_id = $("div[data-blog-comment]").last().attr('data-blog-comment');
    }
    $.ajax({
      url: Wo_Ajax_Requests_File(),
      type: 'GET',
      dataType: 'json',
      data: {
        f:'load-blog-comments',
        offset:last_id,
        b_id:<?php echo $wo['article']['id']; ?>
      },
    }).done(function(data) {
      if (data.status == 200) {
        $(".blog-comlist-container").append(data.html);
      }
      else if(data.status == 404){
        self.text(data.html);
      }
    }).fail(function() {
      console.log("Something went wrong. Try again later");
    })
  });

  $(document).on('click', ".delete-my-blog",function() {
    $.ajax({
      type: "GET",
      url: Wo_Ajax_Requests_File(),
      data: {id: $(this).attr("id"),f:'delete-my-blog'},
      dataType:'json',
      success: function(data) {
         if(data['status'] == 200){
            $("div[data-rm-blog='"+ data['id'] +"']").remove()
         } else {
            alert(data['status'])
         }
      }
    });   
  });

  $(document).on('click', ".del-blog-comment",function() {
    var  self = $(this);
    $.ajax({
      type: "GET",
      url: Wo_Ajax_Requests_File(),
      data: {id: self.attr("id"),f:'del-blog-comment',b_id:<?php echo $wo['article']['id']; ?>},
      dataType:'json',
      success: function(data) {
         if(data['status'] == 200){
            $("div[data-blog-comment='"+ self.attr('id') +"']").slideUp('fast',function(){
              $(".blog-com-top h4 span").text(data.comments);
              $(this).remove();
            })
         }
      }
    });   
  });

  $(document).on('click', ".del-blog-commreplies",function() {
    var  self = $(this);
    $.ajax({
      type: "GET",
      url: Wo_Ajax_Requests_File(),
      data: {id: self.attr("id"),f:'del-blog-commreplies',b_id:<?php echo $wo['article']['id']; ?>},
      dataType:'json',
      success: function(data) {
         if(data['status'] == 200){
            $("div[data-blog-comment-reply='"+ self.attr('id') +"']").slideUp('fast',function(){
              var comments = Number($(".blog-com-top h4 span").text());
              $(".blog-com-top h4 span").text(comments -= 1);
              $(this).remove();
            })
         }
      }
    });   
  });

  $(document).on('click', ".reply-toblogcomm-reply",function() {
    $('.blog-comment-reply-box').each(function(index, el) {
      $(el).addClass('hidden');
    });
    var  self = $(this);
    var name  = $("div[data-blog-comment-reply='"+self.attr('id')+"']").find('a b').text();
    $("div[data-blog-comment='"+self.attr('data-blog-commId')+"']").find('.blog-comment-reply-box').removeClass('hidden').find('textarea').val(name +": ");
  });

  $(document).on('click', ".reply-toblog-comm",function() {
    $('.blog-comment-reply-box').each(function(index, el) {
      $(el).addClass('hidden');
    });
    var  self = $(this);
    $("div[data-blog-comment='"+self.attr('id')+"']").find('.blog-comment-reply-box').toggleClass('hidden').find('textarea').val('');
    
  });

  $("#add-art-comment").click(function(event) {
    <?php if ($wo['loggedin'] != true) { ?>
      document.location = "<?php echo($wo['config']['site_url']) ?>";
    <?php } ?>
    $.ajax({
      url: Wo_Ajax_Requests_File() + '?f=add-blog-comm',
      type: 'POST',
      dataType: 'json',
      data: {text:$("#blog-comment").val(),blog:<?php echo $wo['article']['id']; ?>},
    })
    .done(function(data) {
      if (data.status == 200) {
        if (node_socket_flow == "1") {
            socket.emit("user_notification", { to_id: data.user_id, user_id: _getCookie("user_id"), type: "added" });
        }
        $("#blog-comment").val('');
        $(".blog-comlist-container").prepend(data.html);
        $(".blog-com-top h4 span").text(data.comments);
      }
    })
    .fail(function() {
      console.log("Something went wrong. Try again later");
    })    
  });

});

function Wo_OpenWindow(url) {
  newwindow = window.open('<?php echo($wo['config']['site_url']); ?>/sharer?url=' + url, '', 'height=600,width=800');
   if (window.focus) {
      newwindow.focus();
   }
   return false;
}

function Wo_AddBlogCommentLike(id){
  if (!id) {
    return false;
  }
  var comment_id = id;
  Wo_Delay(function(){
    $.ajax({
      url: Wo_Ajax_Requests_File() + '?f=add-blog-commlikes',
      type: 'POST',
      dataType: 'json',
      data: {id:comment_id,blog_id:<?php echo $wo['article']['id']; ?>},
    }).done(function(data) {
      if (data.status == 200) {
        if (node_socket_flow == "1") {
            socket.emit("user_notification", { to_id: data.user_id, user_id: _getCookie("user_id"), type: "added" });
        }
        $("span[data-blog-comdislikes='"+comment_id+"']").text(data.dislikes);
        $("span[data-blog-comlikes='"+comment_id+"']").text(data.likes);
      }
    }).fail(function() {
      console.log("Something went wrong. Try again later");
    })
  },0);
  
}

function Wo_AddBlogCommentDisLike(id){
  if (!id) {
    return false;
  }
  var comment_id = id;
  Wo_Delay(function(){
    $.ajax({
      url: Wo_Ajax_Requests_File() + '?f=add-blog-commdislikes',
      type: 'POST',
      dataType: 'json',
      data: {id:comment_id,blog_id:<?php echo $wo['article']['id']; ?>},
    }).done(function(data) {
      if (data.status == 200) {
        $("span[data-blog-comdislikes='"+comment_id+"']").text(data.dislikes);
        $("span[data-blog-comlikes='"+comment_id+"']").text(data.likes);
      }
    }).fail(function() {
      console.log("Something went wrong. Try again later");
    })
  },0);
  
}
function Wo_AddBlogCommReplyLike(id){
  if (!id) {
    return false;
  }
  var reply_id = id;
  Wo_Delay(function(){
    $.ajax({
      url: Wo_Ajax_Requests_File() + '?f=add-blog-crlikes',
      type: 'POST',
      dataType: 'json',
      data: {id:reply_id,blog_id:<?php echo $wo['article']['id']; ?>},
    }).done(function(data) {
      if (data.status == 200) {
        $("span[data-blog-comrlikes='"+reply_id+"']").text(data.likes);
        $("span[data-blog-comrdislikes='"+reply_id+"']").text(data.dislikes);
      }
    }).fail(function() {
      console.log("Something went wrong. Try again later");
    })
  },0);
  
}

function Wo_AddBlogCommReplyDisLike(id){
  if (!id) {
    return false;
  }
  var reply_id = id;
  Wo_Delay(function(){
    $.ajax({
      url: Wo_Ajax_Requests_File() + '?f=add-blog-crdislikes',
      type: 'POST',
      dataType: 'json',
      data: {id:reply_id,blog_id:<?php echo $wo['article']['id']; ?>},
    }).done(function(data) {
      if (data.status == 200) {
        $("span[data-blog-comrlikes='"+reply_id+"']").text(data.likes);
        $("span[data-blog-comrdislikes='"+reply_id+"']").text(data.dislikes);
      }
    }).fail(function() {
      console.log("Something went wrong. Try again later");
    })
  },0);
  
}

function Wo_RegisterBlogCommReply(id,event,self){
  <?php if ($wo['loggedin'] != true) { ?>
      document.location = "<?php echo($wo['config']['site_url']) ?>";
    <?php } ?>
  if (event.keyCode==13&&event.shiftKey==0&&event&&id&&self) {
    var text = self.value;
    if (text.length >= 2) {
      $.ajax({
        url: Wo_Ajax_Requests_File() + '?f=add-blog-commreply',
        type: 'POST',
        dataType: 'json',
        data: {c_id:id,text:text,b_id:<?php echo $wo['article']['id']; ?>},
      }).done(function(data) {
        if (data.status == 200) {
          if (node_socket_flow == "1") {
              socket.emit("user_notification", { to_id: data.user_id, user_id: _getCookie("user_id"), type: "added" });
          }
          $("div[data-blog-comment='"+id+"']").find('.blog-comment-reply-cont').append(data.html);
          $(".blog-com-top h4 span").text(data.comments);
          self.value = '';
        }
      }).fail(function() {
        console.log("Something went wrong. Try again later");
      })     
    }
  }

}
</script>
