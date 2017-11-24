<!-- <div class="container pd-20">
  <form action="/" method="GET" class="fr">

    <b class="dib mgr-10">Sort By</b>

    <select name="sortKey" class="form-control dib mgr-20">
      <option value="subscriberCount">Subscribers</option>
      <option value="viewCount">Views</option>
      <option value="videoCount">Uploads</option>
    </select>

    <button type="submit" class="btn btn-primary">Submit</button>      
  </form>
</div> -->

<ul class="grid">
  <h1>Top 50 YouTube Channels</h1>

  <?php foreach ($channels as $c) : ?>
    <li class="clrf">
      <div class="img-wrap">
        <img src="<?= $c->imgUrl ?>">
      </div> 

      <div class="txt-wrap">
        <p>
          <strong>
            <a href="<?= $c->channelUrl ?>" target="_blank">
              <?= $c->title ?>
            </a>
          </strong>          
        </p>

        <p>
          <span class="dib mgb-5"><b>Views:</b> <?= $c->viewCount ?></span><br>
          <span class="dib mgb-5"><b>Subscribers:</b> <?= $c->subscriberCount ?></span><br>
          <span class="dib mgb-5"><b>Uploads:</b> <?= $c->videoCount ?></span>
        </p>
      </div>
    </li>
  <?php endforeach ?>    
</ul>  
