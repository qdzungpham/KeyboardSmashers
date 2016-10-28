package com.example.tests;

import java.util.regex.Pattern;
import java.util.concurrent.TimeUnit;
import org.testng.annotations.*;
import static org.testng.Assert.*;
import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.Select;

public class CareerPageLinkAndCvForm {
  private WebDriver driver;
  private String baseUrl;
  private boolean acceptNextAlert = true;
  private StringBuffer verificationErrors = new StringBuffer();

  @BeforeClass(alwaysRun = true)
  public void setUp() throws Exception {
    driver = new FirefoxDriver();
    baseUrl = "http://pinelands-music.tk/music_school/home.php";
    driver.manage().timeouts().implicitlyWait(30, TimeUnit.SECONDS);
  }

  @Test
  public void testCareerPageLinkAndCvForm() throws Exception {
    driver.get(baseUrl + "/music_school/career.php");
    driver.findElement(By.linkText("Careers")).click();
    driver.findElement(By.xpath("//div[@id='wrapper']/div[2]/a/button")).click();
    driver.findElement(By.name("firstName")).clear();
    driver.findElement(By.name("firstName")).sendKeys("nice");
    driver.findElement(By.name("lastName")).clear();
    driver.findElement(By.name("lastName")).sendKeys("park");
    driver.findElement(By.name("street")).clear();
    driver.findElement(By.name("street")).sendKeys("magaret");
    driver.findElement(By.name("suburb")).clear();
    driver.findElement(By.name("suburb")).sendKeys("brisbane");
    new Select(driver.findElement(By.name("state"))).selectByVisibleText("QLD");
    driver.findElement(By.name("postCode")).clear();
    driver.findElement(By.name("postCode")).sendKeys("4000");
    driver.findElement(By.name("phoneNumber")).clear();
    driver.findElement(By.name("phoneNumber")).sendKeys("0412735850");
    driver.findElement(By.name("email")).clear();
    driver.findElement(By.name("email")).sendKeys("4888757@NAVER.COM");
    driver.findElement(By.name("file")).clear();
    driver.findElement(By.name("file")).sendKeys("C:\\Users\\huisukgyeong\\Desktop\\Capture1.PNG");
    driver.findElement(By.name("submit")).click();
  }

  @AfterClass(alwaysRun = true)
  public void tearDown() throws Exception {
    driver.quit();
    String verificationErrorString = verificationErrors.toString();
    if (!"".equals(verificationErrorString)) {
      fail(verificationErrorString);
    }
  }

  private boolean isElementPresent(By by) {
    try {
      driver.findElement(by);
      return true;
    } catch (NoSuchElementException e) {
      return false;
    }
  }

  private boolean isAlertPresent() {
    try {
      driver.switchTo().alert();
      return true;
    } catch (NoAlertPresentException e) {
      return false;
    }
  }

  private String closeAlertAndGetItsText() {
    try {
      Alert alert = driver.switchTo().alert();
      String alertText = alert.getText();
      if (acceptNextAlert) {
        alert.accept();
      } else {
        alert.dismiss();
      }
      return alertText;
    } finally {
      acceptNextAlert = true;
    }
  }
}
