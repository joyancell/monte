<div class="card">	
	<h5 class="card-header">Simulasi Monte Carlo</h5>
	<div class="card-body">
		Dalam sejarahnya, Simulasi Monte Carlo dikenal dengan istilah sampling simulation atau Monte Carlo Samling Technique. Istilah Monte Carlo pertama digunakan selama masa pengembangan bom atom yang merupakan nama kode dari simulasi nuclear fission. Simulasi ini sering digunakan untuk evaluasi dampak perubahan input dan resiko dalam pembuatan keputusan. Simulasi ini menggunakan data sampling yang telah ada (historical data) dan telah diketahui distribusi datanya.
		<h5 class="mt-4">Metode:</h5>
		<p><b>Linear Congruent Method (LCM)</b></p>
										<p>Pada Simulasi Monte Carlo ini, kami menggunakan metode Linear Congruential Method. Linear Congruent Method (LCM) merupakan metode pembangkitkan bilangan acak yang banyak digunakan dalam program komputer. LCM memanfaatkan model linier untuk membangkitkan bilangan acak. Untuk menghasilkan urutan bilangan bulat X1, X2, ... antara 0 dan m -1 dengan mengikuti hubungan rekursif:</p>
											<pre><b> Xi+1 = (aXi+c) mod m,   i=0,1,2...</b></pre>
											<p> Di mana :
												<ul> 
													<li>Xi = adalah bilangan acak ke i</li>
													<li>a dan c adalah konstanta LCM</li>
													<li>m adalah batas maksimum bilangan acak</li>
												</ul>
											</p>
											<hr/>
										<p> Asumsikan: m > 0 dan a < m, c < m, X0 < m. Pemilihan nilai untuk a, c, m, dan X0 secara drastis mempengaruhi sifat statistik dan panjang siklus. Bilangan bulat acak Xi dihasilkan pada [0, m -1]. Kemudian mengkonversi bilangan bulat Xi menjadi bilangan acak</p>
										<p> Ketentuan-ketentuan pemilihan setiap parameter pada persamaan di atas adalah sebagai berikut : 
											<ol>
												<li>m = modulus, 0 < m</li>
												<li>a = multiplier (pengganda), 0 < a < m</li>
												<li>c = Increment (pertambahan nilai), 0 = c < m</li>
												<li>X0 = nilai awal, 0 = X0 < m</li>
												<li>c dan m merupakan bilangan prima relatif</li>
												<li>a – 1 dapat dibagi oleh faktor prima dari m</li>
												<li>a – 1 merupakan kelipatan 4 jika m juga kelipatan 4</li>
												<li>a harus sangat besar</li>
											</ol>
										</p>
										<p>Ciri khas dari LCM adalah terjadi pengulangan pada periode waktu tertentu atau setelah sekian kali pembangkitan, hal ini adalah salah satu sifat dari metode ini, dan pseudo random generator pada umumnya. Penentuan konstanta LCM (a, c dan m) sangat menentukan baik tidaknya bilangan acak yang diperoleh dalam arti memperoleh bilangan acak yang seakan-akan tidak terjadi pengulangan.</p>
										<p><b>LCG memiliki periode penuh jika dan hanya jika tiga kondisi berikut bertahan (Hull dan Dobell, 1962):</b> 
											<ol>
												<li>Satu-satunya bilangan bulat positif yang (persis) membagi kedua m dan c adalah 1</li>
												<li>Jika q adalah bilangan prima yang membagi m, maka q membagi a-1</li>
												<li>Jika 4 membagi m, maka 4 membagi a-1</li>
											</ol>
										</p>
	</div>
</div>
              
            
