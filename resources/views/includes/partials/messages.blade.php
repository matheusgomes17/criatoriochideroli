@if ($errors->any())
<div class="container clearfix" style="margin-top: 20px;">
    <div class="nobottommargin clearfix">
        <div class="style-msg errormsg">
            <div class="sb-msg"><i class="icon-remove"></i><strong>Atenção!</strong> 
                @foreach ($errors->all() as $error)
                    {!! $error !!}<br/>
                @endforeach
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
    </div>
</div>
@elseif (session()->get('flash_success'))
<div class="container clearfix" style="margin-top: 20px;">
    <div class="nobottommargin clearfix">
        <div class="style-msg successmsg">
            <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Sucesso!</strong> 
                @if(is_array(json_decode(session()->get('flash_success'), true)))
                    {!! implode('', session()->get('flash_success')->all(':message<br/>')) !!}
                @else
                    {!! session()->get('flash_success') !!}
                @endif
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
    </div>
</div>
@elseif (session()->get('flash_warning'))
<div class="container clearfix" style="margin-top: 20px;">
    <div class="nobottommargin clearfix">
        <div class="style-msg alertmsg">
            <div class="sb-msg"><i class="icon-warning-sign"></i><strong>Atenção!</strong> 
                @if(is_array(json_decode(session()->get('flash_warning'), true)))
                    {!! implode('', session()->get('flash_warning')->all(':message<br/>')) !!}
                @else
                    {!! session()->get('flash_warning') !!}
                @endif
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
    </div>
</div>
@elseif (session()->get('flash_info'))
<div class="container clearfix" style="margin-top: 20px;">
    <div class="nobottommargin clearfix">
        <div class="style-msg infomsg">
            <div class="sb-msg"><i class="icon-info-sign"></i><strong>Informação!</strong> 
                @if(is_array(json_decode(session()->get('flash_info'), true)))
                    {!! implode('', session()->get('flash_info')->all(':message<br/>')) !!}
                @else
                    {!! session()->get('flash_info') !!}
                @endif
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
    </div>
</div>
@elseif (session()->get('flash_danger'))
<div class="container clearfix" style="margin-top: 20px;">
    <div class="nobottommargin clearfix">
        <div class="style-msg errormsg">
            <div class="sb-msg"><i class="icon-remove"></i><strong>Erro!</strong> 
                @if(is_array(json_decode(session()->get('flash_danger'), true)))
                    {!! implode('', session()->get('flash_danger')->all(':message<br/>')) !!}
                @else
                    {!! session()->get('flash_danger') !!}
                @endif
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
    </div>
</div>
@elseif (session()->get('flash_message'))
<div class="container clearfix" style="margin-top: 20px;">
    <div class="nobottommargin clearfix">
        <div class="style-msg infomsg">
            <div class="sb-msg"><i class="icon-info-sign"></i>  
                @if(is_array(json_decode(session()->get('flash_message'), true)))
                    {!! implode('', session()->get('flash_message')->all(':message<br/>')) !!}
                @else
                    {!! session()->get('flash_message') !!}
                @endif
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
    </div>
</div>
@endif