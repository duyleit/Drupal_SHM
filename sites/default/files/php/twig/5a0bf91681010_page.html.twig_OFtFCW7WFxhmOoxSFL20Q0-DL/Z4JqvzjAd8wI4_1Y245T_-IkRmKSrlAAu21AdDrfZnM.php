<?php

/* themes/jhvbt/templates/system/page.html.twig */
class __TwigTemplate_e0a0bc9500a183c5c4b9c9d5f65860b2cfce034ccabc00861a6b449a9559be3d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'navbar' => array($this, 'block_navbar'),
            'navbar_fixed' => array($this, 'block_navbar_fixed'),
            'main' => array($this, 'block_main'),
            'header' => array($this, 'block_header'),
            'sidebar_first' => array($this, 'block_sidebar_first'),
            'highlighted' => array($this, 'block_highlighted'),
            'help' => array($this, 'block_help'),
            'content' => array($this, 'block_content'),
            'sidebar_second' => array($this, 'block_sidebar_second'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $tags = array("set" => 59, "if" => 61, "block" => 62);
        $filters = array("clean_class" => 67, "t" => 79);
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('set', 'if', 'block'),
                array('clean_class', 't'),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 54
        echo "
<div class=\"container\">
  ";
        // line 56
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "top", array()), "html", null, true));
        echo "
</div>

";
        // line 59
        $context["container"] = (($this->getAttribute($this->getAttribute(($context["theme"] ?? null), "settings", array()), "fluid_container", array())) ? ("container-fluid") : ("container"));
        // line 61
        if (($this->getAttribute(($context["page"] ?? null), "navigation", array()) || $this->getAttribute(($context["page"] ?? null), "navigation_collapsible", array()))) {
            // line 62
            echo "  ";
            $this->displayBlock('navbar', $context, $blocks);
        }
        // line 99
        echo "
";
        // line 101
        echo "  ";
        if ($this->getAttribute(($context["page"] ?? null), "navbar_fixed", array())) {
            // line 102
            echo "     ";
            $this->displayBlock('navbar_fixed', $context, $blocks);
            // line 121
            echo "  ";
        }
        // line 122
        echo "
";
        // line 124
        $this->displayBlock('main', $context, $blocks);
        // line 200
        echo "
<div class='col-sm-2'>
</div>
  <div class='col-sm-10'>
";
        // line 205
        echo "    <hr>
  \t<h3>Customer </h3>
\t<div class='row'>
\t<div class='col-sm-2 col-sx-6'> 
       <img class='thumbnail img-responsive' src='/themes/jhvbt/images/adidas.jpg' alt=''>  \t
\t</div>
\t<div class='col-sm-2 col-sx-6'> 
       <img class='thumbnail img-responsive' src='/themes/jhvbt/images/newbalance.jpg' alt=''>  \t
\t</div>
\t<div class='col-sm-2 col-sx-6'> 
       <img class='thumbnail img-responsive' src='/themes/jhvbt/images/puma.jpg' alt=''>  \t
\t</div>
\t<div class='col-sm-2 col-sx-6'> 
       <img class='thumbnail img-responsive' src='/themes/jhvbt/images/reebok.jpg' alt=''>  \t
\t</div>
\t<div class='col-sm-2 col-sx-6'> 
       <img class='thumbnail img-responsive' src='/themes/jhvbt/images/reef.jpg' alt=''>  \t
\t</div>
\t </div>  ";
        // line 224
        echo "</div>




";
        // line 229
        if ($this->getAttribute(($context["page"] ?? null), "footer", array())) {
            // line 230
            echo "  ";
            $this->displayBlock('footer', $context, $blocks);
        }
    }

    // line 62
    public function block_navbar($context, array $blocks = array())
    {
        // line 63
        echo "    ";
        // line 64
        $context["navbar_classes"] = array(0 => "navbar", 1 => (($this->getAttribute($this->getAttribute(        // line 66
($context["theme"] ?? null), "settings", array()), "navbar_inverse", array())) ? ("navbar-inverse") : ("navbar-default")), 2 => (($this->getAttribute($this->getAttribute(        // line 67
($context["theme"] ?? null), "settings", array()), "navbar_position", array())) ? (("navbar-" . \Drupal\Component\Utility\Html::getClass($this->getAttribute($this->getAttribute(($context["theme"] ?? null), "settings", array()), "navbar_position", array())))) : (($context["container"] ?? null))));
        // line 70
        echo "    <header";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($this->getAttribute(($context["navbar_attributes"] ?? null), "addClass", array(0 => ($context["navbar_classes"] ?? null), 1 => "container-fluid"), "method"), "removeClass", array(0 => "container"), "method"), "html", null, true));
        echo " id=\"navbar\" role=\"banner\">
      ";
        // line 71
        if ( !$this->getAttribute(($context["navbar_attributes"] ?? null), "hasClass", array(0 => ($context["container"] ?? null)), "method")) {
            // line 72
            echo "        <div class=\"";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["container"] ?? null), "html", null, true));
            echo "\">
      ";
        }
        // line 74
        echo "      <div class=\"navbar-header\">
        ";
        // line 75
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "navigation", array()), "html", null, true));
        echo "
        ";
        // line 77
        echo "        ";
        if ($this->getAttribute(($context["page"] ?? null), "navigation_collapsible", array())) {
            // line 78
            echo "          <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#navbar-collapse\">
            <span class=\"sr-only\">";
            // line 79
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Toggle navigation")));
            echo "</span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
          </button>
        ";
        }
        // line 85
        echo "      </div>

      ";
        // line 88
        echo "      ";
        if ($this->getAttribute(($context["page"] ?? null), "navigation_collapsible", array())) {
            // line 89
            echo "        <div id=\"navbar-collapse\" class=\"navbar-collapse collapse\">
          ";
            // line 90
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "navigation_collapsible", array()), "html", null, true));
            echo "
        </div>
      ";
        }
        // line 93
        echo "      ";
        if ( !$this->getAttribute(($context["navbar_attributes"] ?? null), "hasClass", array(0 => ($context["container"] ?? null)), "method")) {
            // line 94
            echo "        </div>
      ";
        }
        // line 96
        echo "    </header>
  ";
    }

    // line 102
    public function block_navbar_fixed($context, array $blocks = array())
    {
        // line 103
        echo "\t\t\t<div class=\"s_nav\">
        <nav class=\"navbar navbar-default navbar-fixed-top\">
            <div class=\"container-fluid\">
                <div class=\"navbar-header\">
                    <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar3\">
                        <span class=\"sr-only\">Toggle navigation</span>
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                    </button>
                    <a class=\"navbar-brand\" href=\"http://192.168.11.200\"><img src=\"/themes/jhvbt/images/logo-big.png\" alt=\"Shimmer\">
                    </a>
                </div>
            ";
        // line 116
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "navbar_fixed", array()), "html", null, true));
        echo "   
            </div>
        </nav>
     </div>
\t ";
    }

    // line 124
    public function block_main($context, array $blocks = array())
    {
        // line 125
        echo "  <div role=\"main\" class=\"main-container ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["container"] ?? null), "html", null, true));
        echo " js-quickedit-main-content\">
    <div class=\"row\">

      ";
        // line 129
        echo "      ";
        if ($this->getAttribute(($context["page"] ?? null), "header", array())) {
            // line 130
            echo "        ";
            $this->displayBlock('header', $context, $blocks);
            // line 135
            echo "      ";
        }
        // line 136
        echo "\t  
\t  
       ";
        // line 139
        echo "      ";
        if ($this->getAttribute(($context["page"] ?? null), "sidebar_first", array())) {
            // line 140
            echo "        ";
            $this->displayBlock('sidebar_first', $context, $blocks);
            // line 147
            echo "      ";
        }
        // line 148
        echo "\t

\t  
\t
      ";
        // line 153
        echo "      ";
        // line 154
        $context["content_classes"] = array(0 => ((($this->getAttribute(        // line 155
($context["page"] ?? null), "sidebar_first", array()) && $this->getAttribute(($context["page"] ?? null), "sidebar_second", array()))) ? ("col-sm-6") : ("")), 1 => ((($this->getAttribute(        // line 156
($context["page"] ?? null), "sidebar_first", array()) && twig_test_empty($this->getAttribute(($context["page"] ?? null), "sidebar_second", array())))) ? ("col-sm-9") : ("")), 2 => ((($this->getAttribute(        // line 157
($context["page"] ?? null), "sidebar_second", array()) && twig_test_empty($this->getAttribute(($context["page"] ?? null), "sidebar_first", array())))) ? ("col-sm-9") : ("")), 3 => (((twig_test_empty($this->getAttribute(        // line 158
($context["page"] ?? null), "sidebar_first", array())) && twig_test_empty($this->getAttribute(($context["page"] ?? null), "sidebar_second", array())))) ? ("col-sm-12") : ("")));
        // line 161
        echo "      <section class='col-md-10 col-sm-9'>

        ";
        // line 164
        echo "        ";
        if ($this->getAttribute(($context["page"] ?? null), "highlighted", array())) {
            // line 165
            echo "          ";
            $this->displayBlock('highlighted', $context, $blocks);
            // line 168
            echo "        ";
        }
        // line 169
        echo "
        ";
        // line 171
        echo "        ";
        if ($this->getAttribute(($context["page"] ?? null), "help", array())) {
            // line 172
            echo "          ";
            $this->displayBlock('help', $context, $blocks);
            // line 175
            echo "        ";
        }
        // line 176
        echo "
\t\t  \t";
        // line 178
        echo "\t
\t  
\t  \t 
\t\t 
        ";
        // line 183
        echo "        ";
        $this->displayBlock('content', $context, $blocks);
        // line 187
        echo "      </section>

      ";
        // line 190
        echo "      ";
        if ($this->getAttribute(($context["page"] ?? null), "sidebar_second", array())) {
            // line 191
            echo "        ";
            $this->displayBlock('sidebar_second', $context, $blocks);
            // line 196
            echo "      ";
        }
        // line 197
        echo "    </div>
  </div>
";
    }

    // line 130
    public function block_header($context, array $blocks = array())
    {
        // line 131
        echo "          <div class=\"col-sm-12\" role=\"heading\">
            
          </div>
        ";
    }

    // line 140
    public function block_sidebar_first($context, array $blocks = array())
    {
        // line 141
        echo "          <aside class=\"col-md-2 col-sm-3\" role=\"complementary\">
            ";
        // line 142
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "sidebar_first", array()), "html", null, true));
        echo "
\t\t\t";
        // line 144
        echo "\t
          </aside>
        ";
    }

    // line 165
    public function block_highlighted($context, array $blocks = array())
    {
        // line 166
        echo "          ";
        // line 167
        echo "          ";
    }

    // line 172
    public function block_help($context, array $blocks = array())
    {
        // line 173
        echo "          ";
        // line 174
        echo "          ";
    }

    // line 183
    public function block_content($context, array $blocks = array())
    {
        // line 184
        echo "          <a id=\"main-content\"></a>
          ";
        // line 185
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "content", array()), "html", null, true));
        echo "
        ";
    }

    // line 191
    public function block_sidebar_second($context, array $blocks = array())
    {
        // line 192
        echo "          <aside class=\"col-sm-3\" role=\"complementary\">
            ";
        // line 193
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "sidebar_second", array()), "html", null, true));
        echo "
          </aside>
        ";
    }

    // line 230
    public function block_footer($context, array $blocks = array())
    {
        // line 231
        echo "    <footer class=\"footer ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["container"] ?? null), "html", null, true));
        echo "-fliud\" role=\"contentinfo\">
\t      ";
        // line 232
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "footer", array()), "html", null, true));
        echo "
    </footer>
  ";
    }

    public function getTemplateName()
    {
        return "themes/jhvbt/templates/system/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  407 => 232,  402 => 231,  399 => 230,  392 => 193,  389 => 192,  386 => 191,  380 => 185,  377 => 184,  374 => 183,  370 => 174,  368 => 173,  365 => 172,  361 => 167,  359 => 166,  356 => 165,  350 => 144,  346 => 142,  343 => 141,  340 => 140,  333 => 131,  330 => 130,  324 => 197,  321 => 196,  318 => 191,  315 => 190,  311 => 187,  308 => 183,  302 => 178,  299 => 176,  296 => 175,  293 => 172,  290 => 171,  287 => 169,  284 => 168,  281 => 165,  278 => 164,  274 => 161,  272 => 158,  271 => 157,  270 => 156,  269 => 155,  268 => 154,  266 => 153,  260 => 148,  257 => 147,  254 => 140,  251 => 139,  247 => 136,  244 => 135,  241 => 130,  238 => 129,  231 => 125,  228 => 124,  219 => 116,  204 => 103,  201 => 102,  196 => 96,  192 => 94,  189 => 93,  183 => 90,  180 => 89,  177 => 88,  173 => 85,  164 => 79,  161 => 78,  158 => 77,  154 => 75,  151 => 74,  145 => 72,  143 => 71,  138 => 70,  136 => 67,  135 => 66,  134 => 64,  132 => 63,  129 => 62,  123 => 230,  121 => 229,  114 => 224,  94 => 205,  88 => 200,  86 => 124,  83 => 122,  80 => 121,  77 => 102,  74 => 101,  71 => 99,  67 => 62,  65 => 61,  63 => 59,  57 => 56,  53 => 54,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themes/jhvbt/templates/system/page.html.twig", "C:\\xampp\\htdocs\\drupal8\\themes\\jhvbt\\templates\\system\\page.html.twig");
    }
}
