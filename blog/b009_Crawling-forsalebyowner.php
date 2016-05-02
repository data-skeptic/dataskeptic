<?php include("../header.php") ?><div id="bbody"><div class="container" id="notebook-container">
<div class="cell border-box-sizing text_cell rendered">
<div class="prompt input_prompt">
</div>
<div class="inner_cell">
<div class="text_cell_render border-box-sizing rendered_html">
<h1 id="Data-Collection-from-forsalebyowner.com">Data Collection from forsalebyowner.com<a class="anchor-link" href="#Data-Collection-from-forsalebyowner.com">&#182;</a></h1><p>This is a crawl for a site that has "for sale by owner" listings.  Unfortunately, the volume of listings is to low to be particularly interesting for me.  I did this anyway to keep an eye on the data because a single transaction (the absolute best one) would still be worth the investment of time.</p>
</div>
</div>
</div>
<div class="cell border-box-sizing code_cell rendered">
<div class="input">
<div class="prompt input_prompt">In&nbsp;[77]:</div>
<div class="inner_cell">
<div class="input_area">
<div class=" highlight hl-ipython2"><pre><span class="kn">import</span> <span class="nn">requests</span>
<span class="kn">import</span> <span class="nn">BeautifulSoup</span> <span class="kn">as</span> <span class="nn">bsoup</span>
<span class="kn">import</span> <span class="nn">pandas</span> <span class="kn">as</span> <span class="nn">pd</span>
<span class="kn">import</span> <span class="nn">time</span>
<span class="kn">import</span> <span class="nn">datetime</span>
</pre></div>
</div>
</div>
</div>
</div>
<div class="cell border-box-sizing code_cell rendered">
<div class="input">
<div class="prompt input_prompt">In&nbsp;[72]:</div>
<div class="inner_cell">
<div class="input_area">
<div class=" highlight hl-ipython2"><pre><span class="k">def</span> <span class="nf">extract_listings</span><span class="p">(</span><span class="n">txt</span><span class="p">):</span>
    <span class="n">plistings</span> <span class="o">=</span> <span class="p">[]</span>
    <span class="n">s</span> <span class="o">=</span> <span class="n">bsoup</span><span class="o">.</span><span class="n">BeautifulSoup</span><span class="p">(</span><span class="n">txt</span><span class="p">)</span>
    <span class="n">listings</span> <span class="o">=</span> <span class="n">s</span><span class="o">.</span><span class="n">findAll</span><span class="p">(</span><span class="s">&#39;div&#39;</span><span class="p">,</span> <span class="p">{</span><span class="s">&#39;class&#39;</span><span class="p">:</span> <span class="s">&#39;estate-info&#39;</span><span class="p">})</span>
    <span class="k">for</span> <span class="n">listing</span> <span class="ow">in</span> <span class="n">listings</span><span class="p">:</span>
        <span class="n">price</span> <span class="o">=</span> <span class="n">listing</span><span class="o">.</span><span class="n">find</span><span class="p">(</span><span class="s">&#39;div&#39;</span><span class="p">,</span> <span class="p">{</span><span class="s">&#39;class&#39;</span><span class="p">:</span> <span class="s">&#39;estateSummary-price mix-estateSummary_SM-price_sm&#39;</span><span class="p">})</span><span class="o">.</span><span class="n">text</span>
        <span class="n">title</span> <span class="o">=</span> <span class="n">listing</span><span class="o">.</span><span class="n">find</span><span class="p">(</span><span class="s">&#39;div&#39;</span><span class="p">,</span> <span class="p">{</span><span class="s">&#39;class&#39;</span><span class="p">:</span> <span class="s">&#39;estateSummary-title mix-estateSummary_SM-title_sm&#39;</span><span class="p">})</span><span class="o">.</span><span class="n">text</span>
        <span class="n">address</span> <span class="o">=</span> <span class="n">listing</span><span class="o">.</span><span class="n">find</span><span class="p">(</span><span class="s">&#39;div&#39;</span><span class="p">,</span> <span class="p">{</span><span class="s">&#39;class&#39;</span><span class="p">:</span> <span class="s">&#39;estateSummary-address&#39;</span><span class="p">})</span><span class="o">.</span><span class="n">text</span>
        <span class="n">elems</span> <span class="o">=</span> <span class="n">listing</span><span class="o">.</span><span class="n">findAll</span><span class="p">(</span><span class="s">&#39;div&#39;</span><span class="p">,</span> <span class="p">{</span><span class="s">&#39;class&#39;</span><span class="p">:</span> <span class="s">&#39;estateSummary-list&#39;</span><span class="p">})</span>
        <span class="n">beds</span> <span class="o">=</span> <span class="mi">0</span>
        <span class="n">baths</span> <span class="o">=</span> <span class="mi">0</span>
        <span class="n">sqft</span> <span class="o">=</span> <span class="mi">0</span>
        <span class="n">htype</span> <span class="o">=</span> <span class="s">&#39;&#39;</span>
        <span class="n">lastUpdated</span> <span class="o">=</span> <span class="n">listing</span><span class="o">.</span><span class="n">find</span><span class="p">(</span><span class="s">&#39;em&#39;</span><span class="p">,</span> <span class="p">{</span><span class="s">&#39;class&#39;</span><span class="p">:</span> <span class="s">&#39;highlight-text isHiddenSM&#39;</span><span class="p">})</span>
        <span class="k">if</span> <span class="n">lastUpdated</span> <span class="ow">is</span> <span class="bp">None</span><span class="p">:</span>
            <span class="n">lastUpdated</span> <span class="o">=</span> <span class="s">&#39;&#39;</span>
        <span class="k">else</span><span class="p">:</span>
            <span class="n">lastUpdated</span> <span class="o">=</span> <span class="n">lastUpdated</span><span class="o">.</span><span class="n">text</span><span class="o">.</span><span class="n">replace</span><span class="p">(</span><span class="s">&#39;Last updated &#39;</span><span class="p">,</span> <span class="s">&#39;&#39;</span><span class="p">)</span>
        <span class="k">for</span> <span class="n">elem</span> <span class="ow">in</span> <span class="n">elems</span><span class="p">:</span>
            <span class="n">elems2</span> <span class="o">=</span> <span class="n">elem</span><span class="o">.</span><span class="n">findAll</span><span class="p">(</span><span class="s">&#39;div&#39;</span><span class="p">)</span>
            <span class="k">for</span> <span class="n">elem2</span> <span class="ow">in</span> <span class="n">elems2</span><span class="p">:</span>
                <span class="n">txt</span> <span class="o">=</span> <span class="n">elem2</span><span class="o">.</span><span class="n">text</span>
                <span class="k">if</span> <span class="n">txt</span><span class="o">.</span><span class="n">find</span><span class="p">(</span><span class="s">&#39;Beds&#39;</span><span class="p">)</span> <span class="o">&gt;</span> <span class="mi">0</span><span class="p">:</span>
                    <span class="n">beds</span> <span class="o">=</span> <span class="nb">float</span><span class="p">(</span><span class="n">txt</span><span class="p">[</span><span class="mi">0</span><span class="p">:</span><span class="n">txt</span><span class="o">.</span><span class="n">find</span><span class="p">(</span><span class="s">&#39;Beds&#39;</span><span class="p">)]</span><span class="o">.</span><span class="n">strip</span><span class="p">())</span>
                <span class="k">elif</span> <span class="n">txt</span><span class="o">.</span><span class="n">find</span><span class="p">(</span><span class="s">&#39;Baths&#39;</span><span class="p">)</span> <span class="o">&gt;</span> <span class="mi">0</span><span class="p">:</span>
                    <span class="n">baths</span> <span class="o">=</span> <span class="nb">float</span><span class="p">(</span><span class="n">txt</span><span class="p">[</span><span class="mi">0</span><span class="p">:</span><span class="n">txt</span><span class="o">.</span><span class="n">find</span><span class="p">(</span><span class="s">&#39;Baths&#39;</span><span class="p">)]</span><span class="o">.</span><span class="n">strip</span><span class="p">())</span>
                <span class="k">elif</span> <span class="n">txt</span><span class="o">.</span><span class="n">find</span><span class="p">(</span><span class="s">&#39;Sqft&#39;</span><span class="p">)</span> <span class="o">&gt;</span> <span class="mi">0</span><span class="p">:</span>
                    <span class="n">sqft</span> <span class="o">=</span> <span class="nb">int</span><span class="p">(</span><span class="n">txt</span><span class="p">[</span><span class="mi">0</span><span class="p">:</span><span class="n">txt</span><span class="o">.</span><span class="n">find</span><span class="p">(</span><span class="s">&#39;Sqft&#39;</span><span class="p">)]</span><span class="o">.</span><span class="n">replace</span><span class="p">(</span><span class="s">&#39;,&#39;</span><span class="p">,</span> <span class="s">&#39;&#39;</span><span class="p">)</span><span class="o">.</span><span class="n">strip</span><span class="p">())</span>
                <span class="k">else</span><span class="p">:</span>
                    <span class="n">htype</span> <span class="o">=</span> <span class="n">txt</span>
        <span class="n">plisting</span> <span class="o">=</span> <span class="p">{</span><span class="s">&#39;price&#39;</span><span class="p">:</span> <span class="n">price</span><span class="p">,</span> <span class="s">&#39;title&#39;</span><span class="p">:</span> <span class="n">title</span><span class="p">,</span> <span class="s">&#39;lastUpdated&#39;</span><span class="p">:</span> <span class="n">lastUpdated</span><span class="p">,</span> <span class="s">&#39;address&#39;</span><span class="p">:</span> <span class="n">address</span><span class="p">,</span> <span class="s">&#39;beds&#39;</span><span class="p">:</span> <span class="n">beds</span><span class="p">,</span> <span class="s">&#39;baths&#39;</span><span class="p">:</span> <span class="n">baths</span><span class="p">,</span> <span class="s">&#39;sqft&#39;</span><span class="p">:</span> <span class="n">sqft</span><span class="p">,</span> <span class="s">&#39;htype&#39;</span><span class="p">:</span> <span class="n">htype</span><span class="p">}</span>
        <span class="n">plistings</span><span class="o">.</span><span class="n">append</span><span class="p">(</span><span class="n">plisting</span><span class="p">)</span>
    <span class="k">return</span> <span class="n">plistings</span>
</pre></div>
</div>
</div>
</div>
</div>
<div class="cell border-box-sizing code_cell rendered">
<div class="input">
<div class="prompt input_prompt">In&nbsp;[73]:</div>
<div class="inner_cell">
<div class="input_area">
<div class=" highlight hl-ipython2"><pre><span class="n">pnum</span> <span class="o">=</span> <span class="mi">1</span>
<span class="n">test</span> <span class="o">=</span> <span class="o">-</span><span class="mi">1</span>
<span class="n">plistings</span> <span class="o">=</span> <span class="p">[]</span>
<span class="k">while</span> <span class="n">test</span> <span class="o">==</span> <span class="o">-</span><span class="mi">1</span><span class="p">:</span>
    <span class="n">r</span> <span class="o">=</span> <span class="n">requests</span><span class="o">.</span><span class="n">get</span><span class="p">(</span><span class="s">&#39;http://www.forsalebyowner.com/search/list/los-angeles-california/house,condo-types/&#39;</span> <span class="o">+</span> <span class="nb">str</span><span class="p">(</span><span class="n">pnum</span><span class="p">)</span> <span class="o">+</span> <span class="s">&#39;-page/proximity,desc-sort&#39;</span><span class="p">)</span>
    <span class="n">time</span><span class="o">.</span><span class="n">sleep</span><span class="p">(</span><span class="o">.</span><span class="mi">5</span><span class="p">)</span>
    <span class="n">test</span> <span class="o">=</span> <span class="n">r</span><span class="o">.</span><span class="n">text</span><span class="o">.</span><span class="n">find</span><span class="p">(</span><span class="s">&#39;Your search did not yield any results.&#39;</span><span class="p">)</span>
    <span class="k">if</span> <span class="n">test</span> <span class="o">==</span> <span class="o">-</span><span class="mi">1</span><span class="p">:</span>
        <span class="n">plistings</span><span class="o">.</span><span class="n">extend</span><span class="p">(</span><span class="n">extract_listings</span><span class="p">(</span><span class="n">r</span><span class="o">.</span><span class="n">text</span><span class="p">))</span>
    <span class="n">pnum</span> <span class="o">+=</span> <span class="mi">1</span>
<span class="n">df</span> <span class="o">=</span> <span class="n">pd</span><span class="o">.</span><span class="n">DataFrame</span><span class="p">(</span><span class="n">plistings</span><span class="p">)</span>
</pre></div>
</div>
</div>
</div>
</div>
<div class="cell border-box-sizing code_cell rendered">
<div class="input">
<div class="prompt input_prompt">In&nbsp;[74]:</div>
<div class="inner_cell">
<div class="input_area">
<div class=" highlight hl-ipython2"><pre><span class="nb">len</span><span class="p">(</span><span class="n">plistings</span><span class="p">)</span>
</pre></div>
</div>
</div>
</div>
<div class="output_wrapper">
<div class="output">
<div class="output_area"><div class="prompt output_prompt">Out[74]:</div>
<div class="output_text output_subarea output_execute_result">
<pre>23</pre>
</div>
</div>
</div>
</div>
</div>
<div class="cell border-box-sizing code_cell rendered">
<div class="input">
<div class="prompt input_prompt">In&nbsp;[75]:</div>
<div class="inner_cell">
<div class="input_area">
<div class=" highlight hl-ipython2"><pre><span class="n">df</span>
</pre></div>
</div>
</div>
</div>
<div class="output_wrapper">
<div class="output">
<div class="output_area"><div class="prompt output_prompt">Out[75]:</div>
<div class="output_html rendered_html output_subarea output_execute_result">
<div style="max-height:1000px;max-width:1500px;overflow:auto;">
<table border="1" class="dataframe">
<thead>
<tr style="text-align: right;">
<th></th>
<th>address</th>
<th>baths</th>
<th>beds</th>
<th>htype</th>
<th>lastUpdated</th>
<th>price</th>
<th>sqft</th>
<th>title</th>
</tr>
</thead>
<tbody>
<tr>
<th>0</th>
<td>7719 Minstrel Ave,\n                    West H...</td>
<td>2.00</td>
<td>3</td>
<td>Single Family</td>
<td>2 days ago</td>
<td>$559,000</td>
<td>1293</td>
<td>Beautiful Single Story Renovation NOW READY!!!</td>
</tr>
<tr>
<th>1</th>
<td>10650 Holman Ave Unit Apt 307,\n              ...</td>
<td>2.00</td>
<td>2</td>
<td>Condo</td>
<td>3 weeks ago</td>
<td>$739,000</td>
<td>1411</td>
<td>Reduced! Westwood Santa Monica - Cozy Top floo...</td>
</tr>
<tr>
<th>2</th>
<td>4200 Don Luis Drive,\n                    Los ...</td>
<td>2.00</td>
<td>2</td>
<td>Single Family</td>
<td>4 months ago</td>
<td>$699,000</td>
<td>1961</td>
<td>HOUSE SOLD 8/4/15 --- Baldwin Hills - 2bd / 2ba</td>
</tr>
<tr>
<th>3</th>
<td>4435 Colfax Ave Unit 104,\n                   ...</td>
<td>2.50</td>
<td>3</td>
<td>Condo</td>
<td>2 months ago</td>
<td>$699,000</td>
<td>1726</td>
<td>Studio City Lovely Mediterranean town-home</td>
</tr>
<tr>
<th>4</th>
<td>12329 Huston Street,\n                    Vall...</td>
<td>3.00</td>
<td>3</td>
<td>Single Family</td>
<td>a week ago</td>
<td>$1,475,000</td>
<td>2580</td>
<td>VALLEY VILLAGE, 1/2 ACRE, ESTATE LIKE GROUNDS !</td>
</tr>
<tr>
<th>5</th>
<td>5117 Rubio Ave,\n                    Encino</td>
<td>3.00</td>
<td>4</td>
<td>Single Family</td>
<td>a day ago</td>
<td>$1,999,999</td>
<td>4354</td>
<td>For Sale By Owner</td>
</tr>
<tr>
<th>6</th>
<td>6835 Nestle Ave,\n                    Reseda</td>
<td>2.00</td>
<td>3</td>
<td>Single Family</td>
<td>4 months ago</td>
<td>$475,000</td>
<td>1209</td>
<td>Beautiful Neat Pool Home on Large Lot - 3 Bed/...</td>
</tr>
<tr>
<th>7</th>
<td>8830 Chimineas ave,\n                    North...</td>
<td>2.00</td>
<td>3</td>
<td>Single Family</td>
<td></td>
<td>$699,000</td>
<td>2002</td>
<td>complete remodeled home for sale in northridge</td>
</tr>
<tr>
<th>8</th>
<td>6112 Dill Place,\n                    Woodland...</td>
<td>2.75</td>
<td>3</td>
<td>Single Family</td>
<td>2 months ago</td>
<td>$1,260,000</td>
<td>2526</td>
<td>Key &amp;amp; Jonsten Realty</td>
</tr>
<tr>
<th>9</th>
<td>6170 Tony Ave,\n                    Woodland H...</td>
<td>2.00</td>
<td>4</td>
<td>Single Family</td>
<td>5 months ago</td>
<td>$574,000</td>
<td>1404</td>
<td>Woodland Hills 4br, 2ba/Pool Chater Schools</td>
</tr>
<tr>
<th>10</th>
<td>7719 Minstrel Ave,\n                    West H...</td>
<td>2.00</td>
<td>3</td>
<td>Single Family</td>
<td>2 days ago</td>
<td>$559,000</td>
<td>1293</td>
<td>Beautiful Single Story Renovation NOW READY!!!</td>
</tr>
<tr>
<th>11</th>
<td>704 15th Street,\n                    Santa Mo...</td>
<td>2.00</td>
<td>2</td>
<td>Single Family</td>
<td>a month ago</td>
<td>$3,070,000</td>
<td>1174</td>
<td>704 15th St. Santa Monica 90402</td>
</tr>
<tr>
<th>12</th>
<td>3669 Kensley Dr,\n                    Inglewood</td>
<td>3.00</td>
<td>4</td>
<td>Single Family</td>
<td></td>
<td>$550,000</td>
<td>1669</td>
<td>For Sale By Owner-In Litigation for short time</td>
</tr>
<tr>
<th>13</th>
<td>21408 Entrada,\n                    Topanga</td>
<td>3.00</td>
<td>3</td>
<td>Single Family</td>
<td></td>
<td>$1,235,000</td>
<td>1859</td>
<td>A Unique Topanga Gem in PRIME Location!</td>
</tr>
<tr>
<th>14</th>
<td>1028 N. Orchard Drive,\n                    Bu...</td>
<td>2.75</td>
<td>3</td>
<td>Single Family</td>
<td>5 months ago</td>
<td>$793,000</td>
<td>1425</td>
<td>For Sale By Owner &amp;quot;You Won&amp;#039;t like th...</td>
</tr>
<tr>
<th>15</th>
<td>911 Sherlock Drive,\n                    Burbank</td>
<td>1.50</td>
<td>3</td>
<td>Single Family</td>
<td></td>
<td>$820,000</td>
<td>1639</td>
<td>For Sale By Owner</td>
</tr>
<tr>
<th>16</th>
<td>3001 W Norwood Pl,\n                    Alhambra</td>
<td>2.00</td>
<td>2</td>
<td>Single Family</td>
<td>2 weeks ago</td>
<td>$615,000</td>
<td>1550</td>
<td>Spanish Style House with a 900 square foot war...</td>
</tr>
<tr>
<th>17</th>
<td>1107 Woodbury Drive,\n                    Harb...</td>
<td>3.00</td>
<td>4</td>
<td>Single Family</td>
<td></td>
<td>$629,900</td>
<td>2082</td>
<td>Modern Remodeled 4 bedroom Harbor City Home fo...</td>
</tr>
<tr>
<th>18</th>
<td>1004 South Euclid Avenue,\n                   ...</td>
<td>3.00</td>
<td>3</td>
<td>Single Family</td>
<td>2 months ago</td>
<td>$1,895,000</td>
<td>2758</td>
<td>Must See! NEW CONSTRUCTION, Beautiful Home in ...</td>
</tr>
<tr>
<th>19</th>
<td>407 E Sunset St,\n                    Long Beach</td>
<td>2.00</td>
<td>2</td>
<td>Single Family</td>
<td></td>
<td>$329,000</td>
<td>817</td>
<td>Beautiful 2 bedroom and 2 bath REMODELED home ...</td>
</tr>
<tr>
<th>20</th>
<td>2517 JACKSON AVE,\n                    ROSEMEAD</td>
<td>4.00</td>
<td>4</td>
<td>Single Family</td>
<td>2 days ago</td>
<td>$1,930,000</td>
<td>2621</td>
<td>office room can use as 5th bedroom. fishpond</td>
</tr>
<tr>
<th>21</th>
<td>7719 Minstrel Ave,\n                    West H...</td>
<td>2.00</td>
<td>3</td>
<td>Single Family</td>
<td>2 days ago</td>
<td>$559,000</td>
<td>1293</td>
<td>Beautiful Single Story Renovation NOW READY!!!</td>
</tr>
<tr>
<th>22</th>
<td>26156 Hatmor Drive,\n                    Calab...</td>
<td>3.00</td>
<td>4</td>
<td>Single Family</td>
<td></td>
<td>$818,000</td>
<td>1804</td>
<td>For Sale By Owner</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="cell border-box-sizing code_cell rendered">
<div class="input">
<div class="prompt input_prompt">In&nbsp;[76]:</div>
<div class="inner_cell">
<div class="input_area">
<div class=" highlight hl-ipython2"><pre><span class="n">df</span><span class="o">.</span><span class="n">sort</span><span class="p">(</span><span class="s">&#39;price&#39;</span><span class="p">)</span>
</pre></div>
</div>
</div>
</div>
<div class="output_wrapper">
<div class="output">
<div class="output_area"><div class="prompt output_prompt">Out[76]:</div>
<div class="output_html rendered_html output_subarea output_execute_result">
<div style="max-height:1000px;max-width:1500px;overflow:auto;">
<table border="1" class="dataframe">
<thead>
<tr style="text-align: right;">
<th></th>
<th>address</th>
<th>baths</th>
<th>beds</th>
<th>htype</th>
<th>lastUpdated</th>
<th>price</th>
<th>sqft</th>
<th>title</th>
</tr>
</thead>
<tbody>
<tr>
<th>13</th>
<td>21408 Entrada,\n                    Topanga</td>
<td>3.00</td>
<td>3</td>
<td>Single Family</td>
<td></td>
<td>$1,235,000</td>
<td>1859</td>
<td>A Unique Topanga Gem in PRIME Location!</td>
</tr>
<tr>
<th>8</th>
<td>6112 Dill Place,\n                    Woodland...</td>
<td>2.75</td>
<td>3</td>
<td>Single Family</td>
<td>2 months ago</td>
<td>$1,260,000</td>
<td>2526</td>
<td>Key &amp;amp; Jonsten Realty</td>
</tr>
<tr>
<th>4</th>
<td>12329 Huston Street,\n                    Vall...</td>
<td>3.00</td>
<td>3</td>
<td>Single Family</td>
<td>a week ago</td>
<td>$1,475,000</td>
<td>2580</td>
<td>VALLEY VILLAGE, 1/2 ACRE, ESTATE LIKE GROUNDS !</td>
</tr>
<tr>
<th>18</th>
<td>1004 South Euclid Avenue,\n                   ...</td>
<td>3.00</td>
<td>3</td>
<td>Single Family</td>
<td>2 months ago</td>
<td>$1,895,000</td>
<td>2758</td>
<td>Must See! NEW CONSTRUCTION, Beautiful Home in ...</td>
</tr>
<tr>
<th>20</th>
<td>2517 JACKSON AVE,\n                    ROSEMEAD</td>
<td>4.00</td>
<td>4</td>
<td>Single Family</td>
<td>2 days ago</td>
<td>$1,930,000</td>
<td>2621</td>
<td>office room can use as 5th bedroom. fishpond</td>
</tr>
<tr>
<th>5</th>
<td>5117 Rubio Ave,\n                    Encino</td>
<td>3.00</td>
<td>4</td>
<td>Single Family</td>
<td>a day ago</td>
<td>$1,999,999</td>
<td>4354</td>
<td>For Sale By Owner</td>
</tr>
<tr>
<th>11</th>
<td>704 15th Street,\n                    Santa Mo...</td>
<td>2.00</td>
<td>2</td>
<td>Single Family</td>
<td>a month ago</td>
<td>$3,070,000</td>
<td>1174</td>
<td>704 15th St. Santa Monica 90402</td>
</tr>
<tr>
<th>19</th>
<td>407 E Sunset St,\n                    Long Beach</td>
<td>2.00</td>
<td>2</td>
<td>Single Family</td>
<td></td>
<td>$329,000</td>
<td>817</td>
<td>Beautiful 2 bedroom and 2 bath REMODELED home ...</td>
</tr>
<tr>
<th>6</th>
<td>6835 Nestle Ave,\n                    Reseda</td>
<td>2.00</td>
<td>3</td>
<td>Single Family</td>
<td>4 months ago</td>
<td>$475,000</td>
<td>1209</td>
<td>Beautiful Neat Pool Home on Large Lot - 3 Bed/...</td>
</tr>
<tr>
<th>12</th>
<td>3669 Kensley Dr,\n                    Inglewood</td>
<td>3.00</td>
<td>4</td>
<td>Single Family</td>
<td></td>
<td>$550,000</td>
<td>1669</td>
<td>For Sale By Owner-In Litigation for short time</td>
</tr>
<tr>
<th>0</th>
<td>7719 Minstrel Ave,\n                    West H...</td>
<td>2.00</td>
<td>3</td>
<td>Single Family</td>
<td>2 days ago</td>
<td>$559,000</td>
<td>1293</td>
<td>Beautiful Single Story Renovation NOW READY!!!</td>
</tr>
<tr>
<th>10</th>
<td>7719 Minstrel Ave,\n                    West H...</td>
<td>2.00</td>
<td>3</td>
<td>Single Family</td>
<td>2 days ago</td>
<td>$559,000</td>
<td>1293</td>
<td>Beautiful Single Story Renovation NOW READY!!!</td>
</tr>
<tr>
<th>21</th>
<td>7719 Minstrel Ave,\n                    West H...</td>
<td>2.00</td>
<td>3</td>
<td>Single Family</td>
<td>2 days ago</td>
<td>$559,000</td>
<td>1293</td>
<td>Beautiful Single Story Renovation NOW READY!!!</td>
</tr>
<tr>
<th>9</th>
<td>6170 Tony Ave,\n                    Woodland H...</td>
<td>2.00</td>
<td>4</td>
<td>Single Family</td>
<td>5 months ago</td>
<td>$574,000</td>
<td>1404</td>
<td>Woodland Hills 4br, 2ba/Pool Chater Schools</td>
</tr>
<tr>
<th>16</th>
<td>3001 W Norwood Pl,\n                    Alhambra</td>
<td>2.00</td>
<td>2</td>
<td>Single Family</td>
<td>2 weeks ago</td>
<td>$615,000</td>
<td>1550</td>
<td>Spanish Style House with a 900 square foot war...</td>
</tr>
<tr>
<th>17</th>
<td>1107 Woodbury Drive,\n                    Harb...</td>
<td>3.00</td>
<td>4</td>
<td>Single Family</td>
<td></td>
<td>$629,900</td>
<td>2082</td>
<td>Modern Remodeled 4 bedroom Harbor City Home fo...</td>
</tr>
<tr>
<th>2</th>
<td>4200 Don Luis Drive,\n                    Los ...</td>
<td>2.00</td>
<td>2</td>
<td>Single Family</td>
<td>4 months ago</td>
<td>$699,000</td>
<td>1961</td>
<td>HOUSE SOLD 8/4/15 --- Baldwin Hills - 2bd / 2ba</td>
</tr>
<tr>
<th>3</th>
<td>4435 Colfax Ave Unit 104,\n                   ...</td>
<td>2.50</td>
<td>3</td>
<td>Condo</td>
<td>2 months ago</td>
<td>$699,000</td>
<td>1726</td>
<td>Studio City Lovely Mediterranean town-home</td>
</tr>
<tr>
<th>7</th>
<td>8830 Chimineas ave,\n                    North...</td>
<td>2.00</td>
<td>3</td>
<td>Single Family</td>
<td></td>
<td>$699,000</td>
<td>2002</td>
<td>complete remodeled home for sale in northridge</td>
</tr>
<tr>
<th>1</th>
<td>10650 Holman Ave Unit Apt 307,\n              ...</td>
<td>2.00</td>
<td>2</td>
<td>Condo</td>
<td>3 weeks ago</td>
<td>$739,000</td>
<td>1411</td>
<td>Reduced! Westwood Santa Monica - Cozy Top floo...</td>
</tr>
<tr>
<th>14</th>
<td>1028 N. Orchard Drive,\n                    Bu...</td>
<td>2.75</td>
<td>3</td>
<td>Single Family</td>
<td>5 months ago</td>
<td>$793,000</td>
<td>1425</td>
<td>For Sale By Owner &amp;quot;You Won&amp;#039;t like th...</td>
</tr>
<tr>
<th>22</th>
<td>26156 Hatmor Drive,\n                    Calab...</td>
<td>3.00</td>
<td>4</td>
<td>Single Family</td>
<td></td>
<td>$818,000</td>
<td>1804</td>
<td>For Sale By Owner</td>
</tr>
<tr>
<th>15</th>
<td>911 Sherlock Drive,\n                    Burbank</td>
<td>1.50</td>
<td>3</td>
<td>Single Family</td>
<td></td>
<td>$820,000</td>
<td>1639</td>
<td>For Sale By Owner</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="cell border-box-sizing code_cell rendered">
<div class="input">
<div class="prompt input_prompt">In&nbsp;[88]:</div>
<div class="inner_cell">
<div class="input_area">
<div class=" highlight hl-ipython2"><pre><span class="n">dt</span> <span class="o">=</span> <span class="n">datetime</span><span class="o">.</span><span class="n">datetime</span><span class="o">.</span><span class="n">now</span><span class="p">()</span>
<span class="n">dt</span> <span class="o">=</span> <span class="nb">str</span><span class="p">(</span><span class="n">dt</span><span class="o">.</span><span class="n">year</span><span class="p">)</span> <span class="o">+</span> <span class="s">&#39;-&#39;</span> <span class="o">+</span> <span class="nb">str</span><span class="p">(</span><span class="n">dt</span><span class="o">.</span><span class="n">month</span><span class="p">)</span><span class="o">.</span><span class="n">zfill</span><span class="p">(</span><span class="mi">2</span><span class="p">)</span> <span class="o">+</span> <span class="s">&#39;-&#39;</span> <span class="o">+</span> <span class="nb">str</span><span class="p">(</span><span class="n">dt</span><span class="o">.</span><span class="n">day</span><span class="p">)</span><span class="o">.</span><span class="n">zfill</span><span class="p">(</span><span class="mi">2</span><span class="p">)</span>
<span class="n">df</span><span class="o">.</span><span class="n">to_csv</span><span class="p">(</span><span class="s">&#39;out_&#39;</span> <span class="o">+</span> <span class="n">dt</span> <span class="o">+</span> <span class="s">&#39;.tsv&#39;</span><span class="p">,</span> <span class="n">index</span><span class="o">=</span><span class="bp">False</span><span class="p">,</span> <span class="n">sep</span><span class="o">=</span><span class="s">&#39;</span><span class="se">\t</span><span class="s">&#39;</span><span class="p">)</span>
</pre></div>
</div>
</div>
</div>
</div>
</div></div><?php include("../footer.php") ?>