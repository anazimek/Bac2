<div class="articles content"  style="min-height: 500px">
    <style>
        .well:hover {
            -moz-box-shadow: 20px 20px 20px #ccc;
            -webkit-box-shadow: 20px 20px 20px #ccc;
            box-shadow: 5px 5px 5px #000000;
        }

        .article:hover {
            color: red;
        }
        #cat{
        cursor: pointer;
        }

    </style>
    <?php if($this->request->session()->read('Auth')['User']['role_id']=== 1){?>
    <?php $this->layout = 'back'; ?>
    <?php } ?>
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading 1" id="cat">
                    <h4 class="text-center" style="font-weight: 800">Catégories</h4>
                </div>
                <div class="panel-body 2" style="display: none">
                    <a href="<?= $this->url->build(['controller' => 'Articles','action' => 'index'])?>">
                        <div class="well">
                            <p>Tous les Articles</p>
                        </div></a>
            <?php foreach ($categorie as $categories): ?>
                <a href="<?= $this->url->build(['controller' => 'Articles','action' => 'index', $categories->id])?>">
                <div class="well">
                <?= $categories->description?>
                </div></a>
            <?php endforeach; ?>

                </div>
            </div>
        </div>
        <div class="col-md-8">
            <?php foreach ($articles as $article): ?>
                <?php if ($article->published == 1) { ?>
                    <a href="<?= $this->url->build(['controller' => 'Articles', 'action' => 'view', $article->id]) ?>">
                        <div class="row well">
                            <div class="col-md-4">
                                <div style="z-index:1">
                                    <img class="img-responsive" src="../../img/article/<?= h($article->picture_url) ?>">
                                </div>
                                <div class="text-center"
                                     style="position:absolute;top:86px;z-index:2;background-color: #5cb85c;width: 60px;color: white">
                                    <?= $article->has('category') ? ($article->category->description) : '' ?>
                                </div>
                            </div>
                            <div class="col-md-8 article">
                                <h3><?= h($article->name) ?></h3>
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <p style="color: black"><i class="fa fa-pencil-square-o"
                                                                            aria-hidden="true"></i> <?= $article->has('user') ? ($article->user->username) : '' ?>
                                        </p>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <p style="color: black"><i class="fa fa-calendar"
                                                                            aria-hidden="true"></i> <?= h($article->created->i18nFormat('dd-MMM-yyyy')) ?>
                                        </p>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <p style="color: black"><?php $description = mb_substr($article->description, 0, 200);
                                        echo $description;
                                        echo (strlen($description) < strlen($article->description)) ? '...' : ''; ?></p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <?php $nb = 0; ?>
                                        <?php foreach ($article->comments as $comment): ?>
                                            <?php count($comment->description);
                                            $nb++;
                                            ?>
                                        <?php endforeach; ?>
                                        <a class="btn btn-success btn-xs comments" id="<?= $article->id?>"><i class="fa fa-comments" aria-hidden="true">
                                            </i> <?= $nb; ?></a>
                                    </div>
                                    <div class="panel-body" id="commentaire-<?= $article->id?>" style="display: none">
                                        <?php foreach ($article->comments as $comment): ?>
                                            <div class="well" >
                                                <p>Commentaire de <span
                                                        style="font-weight: 800"><?= $comment->user->username ?></span>
                                                </p>
                                                <div><?= $comment->description ?></div>
                                            </div>
                                        <?php endforeach; ?>
                                        <?php if (isset($this->request->session()->read('Auth')['User']['id']) == 2) { ?>
                                            <?= $this->Form->create($comments, ['url' => ['controller' => 'Comments', 'action' => 'add', $article->id]]) ?>
                                                <?= $this->Form->input('description', ['label' => false, 'placeholder' => 'Nouveau Commentaire']); ?>
                                                <?= $this->Form->button(__('Envoyer')) ?>
                                            <?= $this->Form->end() ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            <?php endforeach; ?>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->prev('< ' . __('precedent')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('suivant') . ' >') ?>
                </ul>
                <p><?= $this->Paginator->counter() ?></p>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("a.comments").css('cursor', 'Pointer');
        $('a.comments').bind('click', function () {
            var currentId = $(this).attr('id');
            $('#commentaire-' + currentId + '').toggle('slow');
            // $(this).attr('id');  gets the id of a clicked link that has a class of menu
        });
    });
    $(document).ready(function(){
        $(".1").click(function(){
            $(".2").animate({
                height: 'toggle'
            });
        });
    });
</script>
